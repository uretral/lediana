<div id="previews" class="bg-white lg:rounded -mx-container lg:mx-0 px-16 pt-32 pb-48 lg:pb-32">

    <div class="flex gap-16 mb-32">
        <form wire:submit.prevent="save">
            <input type="file" id="addPhotos" wire:model="tmpPhotos" multiple class="hidden">
            @error('tmpPhotos.*') <span class="error">{{ $message }}</span> @enderror

            @if ($this->tmpPhotos)
                <button type="submit" class="btn btn--md btn--primary flex-grow">Добавить фото</button>
            @else
                <label for="addPhotos" class="btn btn--md btn--primary flex-grow">Выбрать фото</label>
            @endif

        </form>
        <button class="btn btn--md btn--secondary btn--icon" @click="ch">
            <svg aria-hidden="true" class="wh-20 fill-current">
                <use href="/assets/svg/svg.svg#instagram"></use>
            </svg>
        </button>
    </div>

    <div class="text-center" wire:loading wire:target="tmpPhotos">Загружается...</div>

    <ul class="img-preview grid grid-cols-fill-min-90 lg:grid-cols-fill-min-70 gap-8">

        @if ($this->tmpPhotos)
            @foreach($this->tmpPhotos as $key => $tmpPhoto)
                <li>
                    <div class="pb-full relative overflow-hidden rounded-sm">
                        <button class="btn-base absolute left-0 top-0 w-full h-full">
                            <img src="{{ $tmpPhoto->temporaryUrl() }}" class="image-full" alt=""/>
                        </button>
                        <button class="btn-base btn-close btn-close--sm absolute top-4 right-4"
                                aria-label="Закрыть" data-close-modal
                                wire:click="removeTmpPhoto({{$key}})"
                        >
                            <svg aria-hidden="true">
                                <use href="/assets/svg/svg.svg#close"></use>
                            </svg>
                        </button>

                    </div>
                </li>
            @endforeach

        @else

            @foreach($this->printout->pics as $photo)

                @if(!in_array($photo->id, $this->printout->photos()->pluck('photo_id')->toArray()) )
                    <li>
                        <div class="pb-full relative overflow-hidden rounded-sm">
                            <button class="btn-base absolute left-0 top-0 w-full h-full">
                                <img
                                    @dragstart="onPhotoDragStart"
                                    @click="onPhotoClick"
                                    :class="{'active' : $store.editor.uploadImageActive == {{$photo->id}} }"

                                    {{--                                        :class="$store.editor.uploadImageActive == {{$photo->id}} ? 'active' : '' "--}}

                                    data-id="{{$photo->id}}"
                                    src="{{asset('storage/photos/thumbs/'.$this->printout_id)}}/{{$photo->photo}}"
                                    class="image-full" alt="" draggable="true"/>
                            </button>
                            <button class="btn-base btn-close btn-close--sm absolute top-4 right-4"
                                    aria-label="Закрыть" data-close-modal
                                    wire:click="onRemovePhoto({{$photo}})"
                            >
                                <svg aria-hidden="true">
                                    <use href="/assets/svg/svg.svg#close"></use>
                                </svg>
                            </button>
                        </div>
                    </li>
                @endif
            @endforeach
        @endif


    </ul>
</div>




