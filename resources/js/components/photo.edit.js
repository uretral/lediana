document.addEventListener('alpine:init', () => {

    window.Alpine.data('cropper', () => ({
        $store: undefined,
        photoId: '',
        subjectId: '',
        subjectImage: '',
        dataSpread: '',
        dataLayout: '',
        dataLayoutPhoto: '',
        dataSpreadId: null,
        style: '',
        width: '',
        init: () => {
        },


        cropContainerClick: () => {
        },

        onCropReload: () => {
            let e = document.querySelector('.crop-container > div')
            this.subjectId = e.getAttribute('id')
            this.dataSpread = e.getAttribute('data-spread')
            this.dataLayout = e.getAttribute('data-layout')
            this.dataLayoutPhoto = e.getAttribute('data-photo')
            this.cropContainerPreload()
        },


        //////////////////////


        getCoverWidth() {
            window.Livewire.emit('getCoverWidth', 'djdjdjdj')
            // return  document.getElementById('photo-cover').innerHTML
        },

        onPhotoDragStart(a) {
            this.subjectImage = a.target.getAttribute('src')
            this.photoId = a.target.getAttribute('data-id')
            // this.fireChoseEditingPage()
        },


        onPhotoClick(a) {
            this.onPhotoDragStart(a)
            this.$store.editor.uploadImageActive = this.photoId
            this.dataSpreadId = a.target.getAttribute('data-spread-id')
        },

        onPhotoDrop(e) {

            if (e.target.classList.contains('photo-cropped')) {
                // this.fireChoseEditingPage() /* .parentNode.parentNode */
                return false;
            }

            this.subjectId = e.target.getAttribute('id')
            this.dataSpread = e.target.getAttribute('data-spread')
            this.dataLayout = e.target.getAttribute('data-layout')
            this.dataLayoutPhoto = e.target.getAttribute('data-photo')
            this.dataSpreadId = e.target.getAttribute('data-spread-id')
            this.cropContainerPreload()
        },


        subjectOnEnter(e) {
            e.preventDefault()
        },

        fireChoseEditingPage() {
            if (!document.querySelectorAll(".edit").length) {
                Toast.fire({icon: 'warning', title: 'Сначала нужно выбрать страницу'})
                return false
            }
        },

        onPhotoRemove(imgId) {
            window.Livewire.emit('onPhotoRemove', imgId)
        },

        onDeleteCropper(a) {
            // let parent = a.target.parentNode
            // let img = a.target.parentNode.getElementsByTagName('img')[0]
            // this.dataSpreadId =parent.getAttribute('data-spread-id')
            // a.target.parentNode.innerHTML = ''
            // this.cropContainerPreload(true);

            window.Livewire.emit('onImageRemove', a.target.parentNode.getElementsByTagName('img')[0].getAttribute('rel'))

        },

        onResetCropper(a) {

            let parent = a.target.parentNode
            let img = a.target.parentNode.getElementsByTagName('img')[0]
            this.photoId = img.getAttribute('data-id')
            this.subjectImage = img.getAttribute('src')
            this.subjectId = parent.getAttribute('id')
            this.dataLayoutPhoto = parent.getAttribute('data-photo')
            this.dataSpread = parent.getAttribute('data-spread')
            this.dataLayout = parent.getAttribute('data-layout')
            this.dataSpreadId = parent.getAttribute('data-spread-id')
            // console.log(this.photoId, this.subjectImage, this.subjectId, this.dataLayoutPhoto, this.dataSpread, this.dataLayout, this.dataSpreadId);

            this.cropContainerPreload();
        },

        cropContainerPreload() {
            let that = this
            var cropper = new Croppic(this.subjectId, {
                loadPicture: this.subjectImage,
                enableMousescroll: true,
                loaderHtml: '',
                modal: true,
                onBeforeImgCrop: function () {
                    let resource = document.getElementById(this.id);
                    let imgStyle = document.querySelector('.cropImgWrapper img')

                    console.log(imgStyle);

                    let cropData = {
                        imgUrl: this.imgUrl,
                        imgInitW: this.imgInitW,
                        imgInitH: this.imgInitH,
                        imgW: this.imgW,
                        imgH: this.imgH,
                        imgY1: this.imgY1,
                        imgX1: this.imgX1,
                        cropH: this.objH,
                        cropW: this.objW,
                        left: Number(imgStyle.style.left.replace(/[^0-9-.]/g, "")),
                        top: Number(imgStyle.style.top.replace(/[^0-9-.]/g, "")),
                        rotation: this.actualRotation
                    }
                    console.log(document.querySelector('.cropImgWrapper img').style.left);
                    window.Livewire.emit('onImageSaveEvent',
                        that.dataLayoutPhoto,
                        that.dataSpread,
                        that.dataLayout,
                        that.photoId,
                        document.querySelector('.cropImgWrapper').innerHTML,
                        cropData,
                        that.dataSpreadId,
                    )
                    document.querySelector('#croppicModal').remove();


                    that.photoId = ''
                    that.subjectId = ''
                    that.subjectImage = ''
                    that.dataSpread = ''
                    that.dataLayout = ''
                    that.dataLayoutPhoto = ''
                    that.dataSpreadId = null
                    that.style = ''
                    that.width = ''

                },

                /*                onReset: function () {
                                    // cropper.destroy()
                                    document.getElementById('croppicModal').remove()
                                },*/

            });


        }

    }))
})

