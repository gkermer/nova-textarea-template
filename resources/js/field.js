Nova.booting((Vue, router, store) => {
    Vue.component('index-textarea-template', require('./components/IndexField'))
    Vue.component('detail-textarea-template', require('./components/DetailField'))
    Vue.component('form-textarea-template', require('./components/FormField'))
})
