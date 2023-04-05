<ul class="py-20 sm:py-40 px-16 sm:px-50 grid grid-cols-fill-min-120 sm:grid-cols-fill-min-240 gap-20 sm:gap-24 text-tiny">

    @foreach($this->printout->size->cover as $coverType)

        @foreach($coverType->cover->item_materials  as $material)

            <li class="flex flex-col sm:flex-row gap-8 sm:gap-16">

                <label class="block" wire:click="onSetCoverAttributes({{$coverType->cover->id}},{{$material->id}}, {{$this->printout->spread->id}})">
                    <input type="checkbox" name="cover-type" value="1" class="sr-only peer"/>

                    <div class="pb-full sm:pb-0 sm:wh-95 flex-shrink-0 relative cursor-pointer
                    @if($this->printout->spread && $this->printout->spread->cover_material_id === $material->id && $coverType->cover->id === $this->printout->spread->cover_type_id)
                        shadow-active-sm shadow-active
                    @endif">
                        <img src="{{asset('storage/'.$material->icon)}}" class="absolute-image-full rounded-sm"
                             alt="cover icon"/>
                        <div class="btn btn--sm btn--white btn--outlined btn--icon btn--rounded center">+</div>
                    </div>
                </label>
                <div>
                    <div class="font-bold">{{$coverType->cover->title}} - {{$material->title}}</div>
                    <div>{{$material->text}}</div>
                    <div class="font-bold">{{$coverType->price}} ₽</div>
                </div>

            </li>

        @endforeach

    @endforeach


</ul>
