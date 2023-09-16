<section class="contact pb-5 overflow-hidden">
    <div class="container">
        <div class="row mb-4 text-center">
            <h2 class="fw-bold">{{__('Contact Us')}}</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="info-contact text-break shadow p-3 text-center">
                            <i class="bi bi-geo-alt text-primary fs-1"></i>
                            <h5 class="fw-bold">{{__('Address')}}</h5>
                            <p>{{$info->address ?? ''}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-contact text-break shadow p-3 text-center">
                            <i class="bi bi-telephone text-primary fs-1"></i>
                            <h5 class="fw-bold">{{__('Phone number')}}</h5>
                            <span>{{$setting->telephone ?? '' }}</span>
                            <p>{{$setting->telephone2 ?? '' }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-contact text-break shadow p-3 text-center">
                            <i class="bi bi-envelope text-primary fs-1"></i>
                            <h5 class="fw-bold">{{__('Email')}}</h5>
                            <span>{{$setting->email ?? '' }}</span>
                            <p>{{$setting->email2 ?? '' }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-contact text-break shadow p-3 text-center">
                            <i class="bi bi-clock text-primary fs-1"></i>
                            <h5 class="fw-bold">{{__('Support')}}</h5>
                            <p>{{$info->support ?? ''}}</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <form method="POST" action="{{ route('home.contact-us.store')}}" class="contact-form shadow gy-5">
                    @csrf

                    <div class="row">

                            <div class="col-md-6">
                                <label class="form-lable">{{__('name')}}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message  ?? '' }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-lable">{{__('email')}}</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message  ?? '' }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-lable">{{__('subject')}}</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject">
                                @error('subject')
                                    <div class="invalid-feedback">
                                        {{ $message  ?? '' }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-lable">{{__('message')}}</label>
                                <textarea class="form-control  @error('text') is-invalid @enderror" rows="5" name="text"></textarea>
                                @error('text')
                                    <div class="invalid-feedback">
                                        {{ $message  ?? '' }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mt-4 text-center">
                                <button type="submit" class="btn btn-primary">{{__('send')}}</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
