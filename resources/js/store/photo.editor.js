document.addEventListener('alpine:init', () => {
    Alpine.store('editor', {
        init() {
            this.oddClass = ''
            this.evenClass = ''
            this.uploadImageActive = ''
            // this.covwerWidth = this.getCoverWidth()
            window.addEventListener('unsetActiveSpread', () => {
                this.oddClass = ''
                this.evenClass = ''
            })
        },
        getCoverWidth() {
            console.log('asdasdasdasdasd -adasd');
            window.Livewire.emit('getCoverWidth',document.getElementById('photo-cover').offsetWidth)
            // return  document.getElementById('photo-cover').innerHTML
        },
        activatePhoto() {
            window.Livewire.emit('activePhoto')
        },

        activateOdd() {
            if (this.oddClass === 'edit')
                return false
            this.evenClass = ''
            this.oddClass = 'edit'
            window.Livewire.emit('activeOddSpreadEvent')
        },
        activateEven() {
            if (this.evenClass === 'edit')
                return false
            this.evenClass = 'edit'
            this.oddClass = ''
            window.Livewire.emit('activeEvenSpreadEvent')
        },
    })
})
