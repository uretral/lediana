document.addEventListener('alpine:init', () => {
    Alpine.store('editor', {
        init() {
            this.oddClass = ''
            this.evenClass = ''
            this.uploadImageActive = ''
            window.addEventListener('unsetActiveSpread', () => {
                this.oddClass = ''
                this.evenClass = ''
            })
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
