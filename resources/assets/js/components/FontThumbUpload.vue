<template>
    <div>
        <my-upload field="img"
                   @crop-success="cropSuccess"
                   @crop-upload-success="cropUploadSuccess"
                   @crop-upload-fail="cropUploadFail"
                   v-model="show"
                   :width="200"
                   :height="200"
                   url="/fonts/thumb/upload"
                   :params="params"
                   :headers="headers"
                   >

        </my-upload>
        <img :src="imgDataUrl" style="width: 80px;">
        <input type="hidden" class="vuethumb" :value="imgDataUrl">
        <span @click="toggleShow" style="cursor: pointer">点击上传</span>

    </div>
</template>

<script>
    import 'babel-polyfill'; // es6 shim

    import myUpload from 'vue-image-crop-upload/upload-2.vue';

    export default {

        props:['thumb_url'],

        data() {

            return {

                show: false,
                params: {
                    _token: Laravel.csrfToken,
                    name: 'img'
                },
                headers: {
                    smail: '*_~'
                },
                imgDataUrl: this.thumb_url ,// the datebase64 url of created image
                size:0
            }
        },
        components: {
            'my-upload': myUpload
        },
        methods: {
            toggleShow() {
                this.show = !this.show;
            },
            /**
             * crop success
             *
             * [param] imgDataUrl
             * [param] field
             */
            cropSuccess(imgDataUrl, field){
                console.log('-------- crop success --------');
                this.imgDataUrl = imgDataUrl;
            },
            /**
             * upload success
             *
             * [param] jsonData  server api return data, already json encode
             * [param] field
             */
            cropUploadSuccess(response, field){
                console.log('-------- upload success --------');
                console.log(response);
                console.log('field: ' + field);
                $("#old_thumb_url").remove();
                $(".vuethumb").attr('name','thumb_url');
                this.imgDataUrl = response.url;
                this.toggleShow();
            },
            /**
             * upload fail
             *
             * [param] status    server api return error status, like 500
             * [param] field
             */
            cropUploadFail(status, field){
                console.log('-------- upload fail --------');
                console.log(status);
                console.log('field: ' + field);
            }
        }
    }
</script>
