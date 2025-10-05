@extends('layouts.app')
@section('content')

    <section class="AllPropertiesPage">
        <div class="container">
            <div class="PropertiesFiltrationParent">
                <video class="setsrc AllPropertiesCover" rel="{{asset("RRR360/Requirements/Videos/AllPropertiesCover.mp4")}}" loop muted playsinline autoplay></video>
                <div class="PropertiesFiltrationDiv">
                    <h5 class="PropertiesFiltrationHeader">
                        Find Your Dream Home in Amman
                        <u>Villas • Lands • Apartments • Buildings</u>
                    </h5>
                    <div class="PropertiesFiltration">
                        <div class="PropertiesFiltrationField">
                            <h4 onclick="ShowFiltrationOptions($(this))">
                                Property Type
                                <i class="fa fa-angle-down"></i>
                            </h4>
                            <div class="PropertiesFiltrationFieldOptions animate__animated animate__fadeInDown"
                                 id="FltrPropertyType" type="multiple" data-lenis-prevent>
                                @foreach($categories as $key => $category)
                                    <div class="PropertiesFiltrationFieldOptionItem" rel="{{ $category->id ?? '' }}"
                                         onclick="SelectThisFiltrationChoice($(this));GetAllProperties()">{{ $category->title ?? '' }}</div>
                                @endforeach
                            </div>
                        </div>

                        <div class="PropertiesFiltrationField">
                            <h4 onclick="ShowFiltrationOptions($(this))">
                                Area
                                <i class="fa fa-angle-down"></i>
                            </h4>
                            <div class="PropertiesFiltrationFieldOptions animate__animated animate__fadeInDown" id="FltrArea"
                                 type="multiple" data-lenis-prevent>
                                @foreach($areas as $key => $area)
                                    <div class="PropertiesFiltrationFieldOptionItem" rel="{{ $area->id ?? '' }}"
                                         onclick="SelectThisFiltrationChoice($(this));GetAllProperties()">{{ $area->title ?? '' }}</div>
                                @endforeach
                            </div>
                        </div>

                        <div class="PropertiesFiltrationField">
                            <h4 onclick="ShowFiltrationOptions($(this))">
                                Furnishing
                                <i class="fa fa-angle-down"></i>
                            </h4>
                            <div class="PropertiesFiltrationFieldOptions animate__animated animate__fadeInDown"
                                 id="FltrFurnishing" type="multiple" data-lenis-prevent>
                                @foreach($furnishings as $key => $furnishing)
                                    <div class="PropertiesFiltrationFieldOptionItem" rel="{{ $furnishing->id ?? '' }}"
                                         onclick="SelectThisFiltrationChoice($(this));GetAllProperties()">
                                        {{ $furnishing->title ?? '' }}
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="PropertiesFiltrationField">
                            <h4 onclick="ShowFiltrationOptions($(this))">
                                Bedrooms
                                <i class="fa fa-angle-down"></i>
                            </h4>
                            <div class="PropertiesFiltrationFieldOptions animate__animated animate__fadeInDown"
                                 id="FltrBeedrooms" type="singular" data-lenis-prevent>
                                <div class="PropertiesFiltrationFieldOptionItem" rel="1"
                                     onclick="SelectThisFiltrationChoice($(this));GetAllProperties()">1 Bedroom
                                </div>
                                <div class="PropertiesFiltrationFieldOptionItem" rel="2"
                                     onclick="SelectThisFiltrationChoice($(this));GetAllProperties()">2 Bedroom
                                </div>
                                <div class="PropertiesFiltrationFieldOptionItem" rel="3"
                                     onclick="SelectThisFiltrationChoice($(this));GetAllProperties()">3 Bedroom
                                </div>
                                <div class="PropertiesFiltrationFieldOptionItem" rel="4"
                                     onclick="SelectThisFiltrationChoice($(this));GetAllProperties()">4 Bedroom
                                </div>
                                <div class="PropertiesFiltrationFieldOptionItem" rel="5"
                                     onclick="SelectThisFiltrationChoice($(this));GetAllProperties()">5 Bedroom
                                </div>
                                <div class="PropertiesFiltrationFieldOptionItem" rel="6"
                                     onclick="SelectThisFiltrationChoice($(this));GetAllProperties()">6 Bedroom
                                </div>
                                <div class="PropertiesFiltrationFieldOptionItem" rel="7"
                                     onclick="SelectThisFiltrationChoice($(this));GetAllProperties()">7 Bedroom
                                </div>
                                <div class="PropertiesFiltrationFieldOptionItem" rel="8"
                                     onclick="SelectThisFiltrationChoice($(this));GetAllProperties()">8 Bedroom
                                </div>
                                <div class="PropertiesFiltrationFieldOptionItem" rel="9"
                                     onclick="SelectThisFiltrationChoice($(this));GetAllProperties()">9 Bedroom
                                </div>
                                <div class="PropertiesFiltrationFieldOptionItem" rel="9"
                                     onclick="SelectThisFiltrationChoice($(this));GetAllProperties()">10 Bedroom
                                </div>
                            </div>
                        </div>

                        <div class="PropertiesFiltrationField">
                            <input
                                type="number"
                                placeholder="Max Price (JOD)"
                                min="0"
                                id="PropertyMaxPrice"
                                onkeyup="debouncedMaxPriceChange($(this))"></div>
                    </div>
                </div>
            </div>


            <h4 class="FiltrationMap"></h4>

            <div class="PropertiesGH">

            </div>

            <div class="PropertiesPagination"></div>
        </div>
    </section>
@endsection
@section('scripts')
    @parent
    <script>
        $(document).ready(function() {
            // Get the 'category' parameter from the URL
            const urlParams = new URLSearchParams(window.location.search);
            const categoryParam = urlParams.get('category');

            // If it exists, find the matching item and add the class
            if (categoryParam) {
                $('.PropertiesFiltrationFieldOptionItem').each(function() {
                    if ($(this).attr('rel') == categoryParam) {
                        $(this).addClass('Parametered');
                    }
                });
            }
        });

        $(window).on('load',function (){
            if($('.Parametered').length != 0){
                $('.Parametered')[0].click()
            }
            GetAllProperties()
        });
    </script>
@endsection
