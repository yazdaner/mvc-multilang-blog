@if ($gallery->isNotEmpty())

<section class="gallery my-5" x-data="tabs">
    <div class="container">
        <div class="row pb-5">
            <div class="col-12 text-center">
                <h2 class="fw-bold">{{__('gallery of photos')}}</h2>
                <div class="heading-line"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center mb-5">
                <template x-for="(tab, index) in tabs" :key="index">
                    <button @click="tabName = tab.category" x-text="tab.category"
                        class="btn btn-rounded-outline-primary border-primary"></button>
                </template>
            </div>
        </div>
        <template x-for="(tab, index) in tabs" :key="index">
            <div class="row gy-4 mb-4" x-show="tab.category === tabName">
                <template x-for="(item, index) in tab.images" :key="index">

                    <div class="col-md-6 col-lg-4">
                        <div class="box position-relative rounded">
                            <img class="img-fluid" :src="item.image" alt="">
                            <div
                                class="portfolio position-absolute top-50 start-50 d-flex flex-column translate-middle justify-content-center text-center text-white">
                                <h4 x-text="item.title">Lorem ipsum</h4>
                                <p x-text="item.caption">Lorem ipsum dolor sit amet consectetur</p>
                            </div>
                        </div>
                    </div>
                </template>

            </div>
        </template>
    </div>
</section>
@endif
