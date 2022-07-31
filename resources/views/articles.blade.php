@extends('layouts.main')

@section('container')

    <section class="pt-5" id="destination">
        <div class="container">
            <div
                class="position-absolute start-100 bottom-0 translate-middle-x d-none d-xl-block ms-xl-n4">
            </div>
            <div class="mb-7 text-center">
                <h5 class="text-secondary">List</h5>
                <h3
                    class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">
                    List Articles</h3>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="card overflow-hidden shadow"> <img
                            class="card-img-top"
                            src="assets/img/dest/komodo.jpg"
                            alt="Rome, Italty" />
                        <div class="card-body py-4 px-3">
                            <div
                                class="d-flex flex-column flex-lg-row justify-content-between mb-3">
                                <h4 class="text-secondary fw-medium"><a
                                        class="link-900 text-decoration-none stretched-link"
                                        href="/detailwisata">Kuta Beach</a></h4>
                                <span class="fs-1 fw-medium">IDR
                                    10.000</span>
                            </div>
                            <div class="d-flex align-items-center"> <img
                                    src="assets/img/dest/star.png"
                                    style="margin-right: 14px" width="20"
                                    alt="navigation" /><span
                                    class="fs-0 fw-medium">4.5/5</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>


@endsection
