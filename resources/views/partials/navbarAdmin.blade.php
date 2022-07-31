<nav class="navbar navbar-expand-lg navbar-light fixed-top py-5 d-block"
    data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon">
            </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0"
            id="navbarSupportedContent">
            <ul
                class="navbar-nav ms-auto pt-2 pt-lg-0 font-base align-items-lg-center align-items-start">
                <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium"
                        aria-current="page" href="/admin-wisata">Data Articles</a>
                </li>
                <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium"
                        aria-current="page" href="/admin-customer">Data Categories
                        </a>
                </li>

                <li class="nav-item px-3 px-xl-4">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="nav-link fw-medium"
                            style="background-color:white; border-color: transparent;"
                            aria-current="page">Logout <svg
                                xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor"
                                class="bi bi-arrow-right-circle"
                                viewBox="0 0 16 16">
                            </svg>
                </li></button>
                </form>

            </ul>
        </div>
    </div>
</nav>
<section style="padding-top: 5rem;">

