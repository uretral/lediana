document.addEventListener('alpine:init', () => {

    window.Alpine.data('cropper', () => ({
        $store: undefined,
        photoId: '',
        subjectId: '',
        subjectImage: '',
        dataSpread: '',
        dataLayout: '',
        dataLayoutPhoto: '',
        style: '',

        onPhotoDragStart(a) {
            this.subjectImage = a.target.getAttribute('src')
            this.photoId = a.target.getAttribute('data-id')
            // this.fireChoseEditingPage()
        },


        onPhotoClick(a) {
            this.onPhotoDragStart(a)
            this.$store.editor.uploadImageActive = this.photoId
        },

        onPhotoDrop(e) {

            if (!e.target.parentNode.parentNode.classList.contains('edit')) {
                // this.fireChoseEditingPage()
                return false;
            }

            this.subjectId = e.target.getAttribute('id')
            this.dataSpread = e.target.getAttribute('data-spread')
            this.dataLayout = e.target.getAttribute('data-layout')
            this.dataLayoutPhoto = e.target.getAttribute('data-photo')

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

        onResetCropper(a) {

            if (!a.target.parentNode.parentNode.parentNode.parentNode.classList.contains('edit')) return false

            let parent = a.target.parentNode.parentNode
            let img = a.target.parentNode.parentNode.getElementsByTagName('img')[0]

            this.photoId = img.getAttribute('data-id')
            this.subjectImage = img.getAttribute('src')
            this.subjectId = parent.getAttribute('id')
            this.dataLayoutPhoto = parent.getAttribute('data-photo')
            this.dataSpread = parent.getAttribute('data-spread')
            this.dataLayout = parent.getAttribute('data-layout')
            a.target.parentNode.remove()
            this.cropContainerPreload();




        },

        onPhotoClickOutside() {
            /*            const links = document.getElementsByClassName('cropControlCrop')
                        console.log('dsfsdfsd, links);
            /*            document.addEventListener('click', function(event) {
                            const links = document.getElementsByClassName('cropControlCrop')
                            const isInside = links[0].contains(event.target);
                            /!*                if (!isInside){
                                                document.querySelectorAll('.cropControlCrop').forEach((el) => {
                                                    el.addEventListener('click', function(e) {
                                                        console.log(e.type, e);
                                                    })
                                                    let ev = new Event("click", {bubbles : true, cancelable : true})
                                                    el.dispatchEvent(ev);
                                                })
                                            }*!/
                        })*/
        },

        cropContainerPreload() {
            let that = this
            new Croppic(this.subjectId, {
                loadPicture: this.subjectImage,
                enableMousescroll: true,
                loaderHtml: '',
                onBeforeImgCrop: function () {
                    let resource = document.getElementById(this.id);
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
                        rotation: this.actualRotation
                    }

                    window.Livewire.emit('onImageSaveEvent',
                        that.dataLayoutPhoto,
                        that.dataSpread,
                        that.dataLayout,
                        that.photoId,
                        $(resource).find('.cropImgWrapper').html(),
                        cropData
                    )
                },
            });
        }

    }))
})

