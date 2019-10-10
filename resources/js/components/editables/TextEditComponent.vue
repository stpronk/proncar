<template>
    <div class="editor">
        <editor-menu-bubble class="menububble" :editor="editor" @hide="hideLinkMenu" v-slot="{ commands, isActive, getMarkAttrs, menu }">
            <div
                    class="menububble"
                    :class="{ 'is-active': menu.isActive }"
                    :style="`left: ${menu.left}px; bottom: ${menu.bottom}px;`"
            >

                <form class="menububble__form" v-if="linkMenuIsActive" @submit.prevent="setLinkUrl(commands.link, linkUrl)">
                    <input class="menububble__input" type="text" v-model="linkUrl" placeholder="https://" ref="linkInput" @keydown.esc="hideLinkMenu"/>
                    <button class="menububble__button" @click="setLinkUrl(commands.link, null)" type="button">
                        <icon icon="unlink"></icon>
                    </button>
                </form>

                <template v-else>
                    <button v-if="options.link"
                            class="menububble__button"
                            @click="showLinkMenu(getMarkAttrs('link'))"
                            :class="{ 'is-active': isActive.link() }"
                    >
                        <span><icon icon="link"></icon></span>

                    </button>
                    <button v-if="options.bold"
                            class="menububble__button"
                            @click="commands.bold"
                            :class="{ 'is-active': isActive.bold() }"
                            >
                        <span><icon icon="bold"></icon></span>
                    </button>
                    <button v-if="options.italic"
                            class="menububble__button"
                            @click="commands.italic"
                            :class="{ 'is-active': isActive.italic() }"
                    >
                        <span><icon icon="italic"></icon></span>
                    </button>
                    <button v-if="options.underline"
                            class="menububble__button"
                            @click="commands.underline"
                            :class="{ 'is-active': isActive.underline() }"
                    >
                        <span><icon icon="underline"></icon></span>
                    </button>
                    <button v-if="options.strike"
                            class="menububble__button"
                            @click="commands.strike"
                            :class="{ 'is-active': isActive.strike() }"
                    >
                        <span><icon icon="strikethrough"></icon></span>
                    </button>
                </template>
            </div>
        </editor-menu-bubble>

        <div :class="processingData === true ? 'unclickable ' + classes : classes">
            <editor-content :editor="editor"></editor-content>

            <div v-if="processingData" class="spinner">
                <icon icon="spinner" spin></icon>
            </div>
        </div>
    </div>
</template>

<script>
    import { Editor, EditorContent, EditorMenuBubble } from 'tiptap'
    import {
        Bold,
        Italic,
        Link,
        Strike,
        Underline,
        Image,
    } from 'tiptap-extensions'

    export default {
        props: {
            selector: {type: String, required: true},
            body: {type: String, required: true},
            classes: {type: String, required: false},
            options: {type: Object, required: false},
            uuid: {type: String, required: false}
        },
        components: {
            EditorContent,
            EditorMenuBubble,
        },
        data() {
            return {
                originalData: {
                    selector: this.selector,
                    body: this.body,
                    classes: this.classes,
                    options: this.options,
                    uuid: this.uuid
                },
                data: this.body,
                images: {},

                processingData: false,

                editor: new Editor({
                    content: this.body,

                    extensions: [
                        new Bold(),
                        new Italic(),
                        new Link(),
                        new Strike(),
                        new Underline(),
                        new Image()
                    ],

                    onUpdate: ( { getHTML } ) => {
                        this.data = getHTML();

                    },

                    onBlur: () => {
                        this.processData(this.data);
                    }
                }),

                linkUrl: null,
                linkMenuIsActive: false,
            }
        },
        methods: {
            showLinkMenu(attrs) {
                this.linkUrl = attrs.href;
                this.linkMenuIsActive = true;
                this.$nextTick(() => {
                    this.$refs.linkInput.focus();
                })
            },
            hideLinkMenu() {
                this.linkUrl = null;
                this.linkMenuIsActive = false;
            },
            setLinkUrl(command, url) {
                command({ href: url });
                this.hideLinkMenu();
                this.editor.focus();
            },
            processData(data){
                // See if the data is the same or different
                if(this.originalData.body === data){
                    return;
                }

                let regex = /<img.*?src="(.*?)".*?>/;
                let src = regex.exec(data);

                if(src){
                    src = src[1];
                }

                // Setup some variables
                this.processingData = true;
                const vm = this;

                // Ajax call to the backend
                this.axios.post('/store', {
                    selector: this.selector,
                    uuid: this.uuid,
                    data: this.data,
                    image: src
                }).then(response => {
                    vm.processingData = false;
                    vm.originalData.body = data;
                }).catch(error => {
                    console.log(error);
                    vm.processingData = false;
                });
            }
        },
        beforeDestroy() {
            this.editor.destroy()
        },
    }
</script>

<style type="scss">
    *:focus {
        outline: none;
    }

    .unclickable {
        pointer-events: none;
    }

    .spinner {
        position: absolute;
        font-size: 18px;
        height: 0;

        right: 0;
        top: 0;
    }
</style>
