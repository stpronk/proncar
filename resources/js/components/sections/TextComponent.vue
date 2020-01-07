<template>
    <section>
        <div class="container mt-5 mb-5">
            <div v-for="item in items">
                <div v-if="auth">
                    <text-edit-component :page="item.page" :path="item.path" :uuid="item.uuid" :change="'body'" :body="item.body" :options="{
                                        bold: true,
                                        italic: true,
                                        strike: true,
                                        underline: true
                                    }"></text-edit-component>
                </div>
                <div v-else v-html="item.body"></div>
            </div>
        </div>

    </section>
</template>

<script>
    export default {
      props: {
        content: {
          type: Object,
          required: true
        },
        page: {
          type: String,
          required: true
        },
        uuid: {
          type: String,
          required: true
        },
        auth: {
          required: true
        }
      },
      computed: {
        items: function () {
          const array = [];
          Object.entries(this.content).forEach(([key, item]) => {
            array.push({
              page: this.page,
              path: this.uuid+'.content',
              uuid: key,
              body: item.body
            })
          });
          return array;
        }
      }
    }
</script>