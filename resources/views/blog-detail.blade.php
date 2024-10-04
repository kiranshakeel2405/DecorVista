@extends('master');
@section('content')

<main>
    <!-- Breadcrumb area start  -->
    <div
        class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="assets/imgs/breadcrumb/page-header-1.png"></div>
        <div class="container">
            <div class="breadcrumb__bg-left"></div>
            <div class="breadcrumb__bg-right"></div>
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Blog Details
                        </h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="index.html">Home</a></span></li>
                                    <li class="active"><span>Blog Details</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <!-- blog-details area start -->
    <section class="blog-details section-space">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="blog-details__content">
                        <div class="blog-details__media">
                            <img src="assets/imgs/blog-details/blog-details.jpg" alt="image not found">
                        </div>

                        <ul class="blog-details__meta">
                            <li>
                                <a href="blog-details.html">
                                    <svg width="11" height="13" viewBox="0 0 11 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.5625 2H6.9375V1.0625C6.9375 0.757812 7.17188 0.5 7.5 0.5C7.80469 0.5 8.0625 0.757812 8.0625 1.0625V2H9C9.82031 2 10.5 2.67969 10.5 3.5V11C10.5 11.8438 9.82031 12.5 9 12.5H1.5C0.65625 12.5 0 11.8438 0 11V3.5C0 2.67969 0.65625 2 1.5 2H2.4375V1.0625C2.4375 0.757812 2.67188 0.5 3 0.5C3.30469 0.5 3.5625 0.757812 3.5625 1.0625V2ZM1.125 6.3125H3V5H1.125V6.3125ZM1.125 7.4375V8.9375H3V7.4375H1.125ZM4.125 7.4375V8.9375H6.375V7.4375H4.125ZM7.5 7.4375V8.9375H9.375V7.4375H7.5ZM9.375 5H7.5V6.3125H9.375V5ZM9.375 10.0625H7.5V11.375H9C9.1875 11.375 9.375 11.2109 9.375 11V10.0625ZM6.375 10.0625H4.125V11.375H6.375V10.0625ZM3 10.0625H1.125V11C1.125 11.2109 1.28906 11.375 1.5 11.375H3V10.0625ZM6.375 5H4.125V6.3125H6.375V5Z"
                                            fill="#906E50" />
                                    </svg>
                                    October 19, 2023
                                </a>
                            </li>
                            <li>
                                <a href="blog-details.html">
                                    <svg width="12" height="14" viewBox="0 0 12 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.90625 8.34375C9.36914 8.34375 11.375 10.3496 11.375 12.8125C11.375 13.2695 10.9941 13.625 10.5625 13.625H0.8125C0.355469 13.625 0 13.2695 0 12.8125C0 10.3496 1.98047 8.34375 4.46875 8.34375H6.90625ZM1.21875 12.4062H10.1309C9.92773 10.8066 8.55664 9.5625 6.90625 9.5625H4.46875C2.79297 9.5625 1.42188 10.8066 1.21875 12.4062ZM5.6875 7.125C3.88477 7.125 2.4375 5.67773 2.4375 3.875C2.4375 2.09766 3.88477 0.625 5.6875 0.625C7.46484 0.625 8.9375 2.09766 8.9375 3.875C8.9375 5.67773 7.46484 7.125 5.6875 7.125ZM5.6875 1.84375C4.54492 1.84375 3.65625 2.75781 3.65625 3.875C3.65625 5.01758 4.54492 5.90625 5.6875 5.90625C6.80469 5.90625 7.71875 5.01758 7.71875 3.875C7.71875 2.75781 6.80469 1.84375 5.6875 1.84375Z"
                                            fill="#906E50" />
                                    </svg>

                                    By admin
                                </a>
                            </li>
                            <li>
                                <a href="blog-details.html">
                                    <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.28125 0.625C9.17578 0.625 11.5625 2.63086 11.5625 5.09375C11.5625 7.58203 9.17578 9.5625 6.28125 9.5625C5.79883 9.5625 5.3418 9.51172 4.88477 9.41016C4.12305 9.89258 3.00586 10.375 1.60938 10.375C1.35547 10.375 1.12695 10.248 1.05078 9.99414C0.949219 9.76562 0.974609 9.51172 1.15234 9.30859C1.17773 9.30859 1.73633 8.69922 2.14258 7.88672C1.43164 7.125 1 6.16016 1 5.09375C1 2.63086 3.36133 0.625 6.28125 0.625ZM5.16406 8.2168C5.54492 8.31836 5.90039 8.34375 6.28125 8.34375C8.51562 8.34375 10.3438 6.89648 10.3438 5.09375C10.3438 3.31641 8.51562 1.84375 6.28125 1.84375C4.02148 1.84375 2.21875 3.31641 2.21875 5.09375C2.21875 6.00781 2.65039 6.66797 3.03125 7.04883L3.64062 7.68359L3.23438 8.4707C3.13281 8.62305 3.03125 8.80078 2.92969 8.97852C3.38672 8.85156 3.81836 8.64844 4.25 8.36914L4.68164 8.11523L5.16406 8.2168ZM12.1973 3.90039C15.0156 4.00195 17.25 5.95703 17.25 8.34375C17.25 9.41016 16.793 10.375 16.082 11.1367C16.4883 11.9492 17.0469 12.5586 17.0723 12.5586C17.25 12.7617 17.2754 13.0156 17.1738 13.2441C17.0977 13.498 16.8691 13.625 16.6152 13.625C15.2188 13.625 14.1016 13.1426 13.3398 12.6602C12.8828 12.7617 12.4258 12.8125 11.9688 12.8125C9.88672 12.8125 8.08398 11.7969 7.2207 10.3242C7.65234 10.2734 8.08398 10.1719 8.46484 10.0195C9.17578 10.9844 10.4707 11.5938 11.9688 11.5938C12.3242 11.5938 12.6797 11.5684 13.0605 11.4668L13.543 11.3652L13.9746 11.6191C14.4062 11.8984 14.8379 12.1016 15.2949 12.2285C15.1934 12.0508 15.0918 11.873 14.9902 11.7207L14.584 10.9336L15.1934 10.2988C15.5742 9.91797 16.0312 9.25781 16.0312 8.34375C16.0312 6.66797 14.4062 5.29688 12.3496 5.11914L12.375 5.09375C12.375 4.6875 12.2988 4.28125 12.1973 3.90039Z"
                                            fill="#906E50" />
                                    </svg>

                                    Comments (05)
                                </a>
                            </li>
                        </ul>

                        <h4>Living Experience with Luxurious Interiors.</h4>

                        <p>There are many variations of passages of Lorem Ipsum available, but majority have suffered
                            alteration in some form, by injected humour, or randomised words which don’t look even
                            slightly believable. If you are going to use a passage of Lorem Ipsum. There are many
                            variations of passages of Lorem Ipsum available, but majority have suffered alteration in
                            some form, by injected humour, or randomised words which don’t look even slightly
                            believable. If you are going to use a passage of Lorem Ipsum.</p>

                        <p>Suspendisse ultricies vestibulum vehicula. Proin laoreet porttitor lacus. Duis auctor vel ex
                            eu elementum. Fusce eu volutpat felis. Proin sed eros tincidunt, sagittis sapien eu, porta
                            diam. Aenean finibus scelerisque nulla non facilisis. Fusce vel orci sed quam gravid</p>

                        <blockquote>
                            <div class="icon">
                                <img src="assets/imgs/blog-details/quite.png" alt="image not found">
                            </div>
                            <p>Diam luctus nostra dapibus varius et semper semper rutrum ad risus felis eros. Cursus
                                libero viverra tempus netus diam vestibulum</p>

                            <h6>Douglas Lyphe</h6>
                        </blockquote>

                        <div class="blog-details__media">

                            <a href="https://www.youtube.com/watch?v=blrw3LTAZIE"
                                class="popup-video d-flex align-items-center"
                                data-effect="mfp-move-from-top vertical-middle">
                                <div class="icon">
                                    <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0L14 9L0 18V0Z" fill="white" />
                                    </svg>
                                </div>
                                <img src="assets/imgs/blog-details/blog-details-2.jpg" alt="">
                            </a>
                        </div>

                        <h4>Easy & Most Powerful Server Platform.</h4>

                        <p>Pellentesque dignissim malesuada varius et semper semper rutrum ad risus felis eros. Cursus
                            libero viverra tempus netus diam vestibulum lorem tincidunt congue porta. Non ligula egestas
                            commodo massa. Lorem non gravida risus felis rutrum.</p>

                        <div class="blog-details__tag">
                            <div class="blog-details__tag-list__wrapper">
                                <h6>Tags :</h6>
                                <ul class="blog-details__tag-list">
                                    <li><a href="blog-details.html">Branding</a></li>
                                    <li><a href="blog-details.html">Web Design</a></li>
                                    <li><a href="blog-details.html">Creative</a></li>
                                </ul>
                            </div>
                            <div class="blog-details__sheir__wrapper">
                                <h6>Share:</h6>
                                <ul class="blog-details__sheir-icon">
                                    <li><a href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="blog-details-pagination">

                            <div class="blog-details-pagination__next">
                                <a href="blog-details.html">PREV POST</a>
                                <h6>How Does Screen Work</h6>
                            </div>

                            <hr>

                            <div class="blog-details-pagination__prev">
                                <a href="blog-details.html">NEXT POST</a>
                                <h6>How Does Screen Work</h6>
                            </div>
                        </div>

                        <div class="comment-widget mt-50 mt-xs-60">
                            <h6 class="comment-widget__title">02 Comments</h6>

                            <div class="comment-item d-flex align-items-start mb-30">
                                <div class="comment-item__img">
                                    <img src="assets/imgs/blog-details/author-1.png" alt="image not found">
                                </div>
                                <div class="comment-item__content">
                                    <span class="name">Russell Sprout</span>
                                    <span class="date">march 26,2024 at 10:47 pm</span>
                                    <p>Phasellus ac eleifend nunc. Aenean efficitur, augue a tristique mollis, nulla leo
                                        dictum nunc, viverra magna sapien ut dolor.</p>
                                    <button class="rr-btn btn-gary">
                                        <span class="btn-wrap">
                                            <span class="text-one">Reply</span>
                                            <span class="text-two">Reply</span>
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <div class="comment-item d-flex align-items-start comment-item__reply mb-30">
                                <div class="comment-item__img">
                                    <img src="assets/imgs/blog-details/author-2.png" alt="image not found">
                                </div>
                                <div class="comment-item__content">
                                    <span class="name">Fletch Skinner</span>
                                    <span class="date mb-10">march 26,2024 at 10:47 pm</span>
                                    <p class="mb-20">Phasellus ac eleifend nunc. Aenean efficitur, augue a tristique
                                        mollis, nulla leo dictum nunc, viverra magna sapien ut dolor.</p>
                                    <button class="rr-btn">
                                        <span class="btn-wrap">
                                            <span class="text-one">Reply</span>
                                            <span class="text-two">Reply</span>
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <div class="comment-item d-flex align-items-start mb-30">
                                <div class="comment-item__img">
                                    <img src="assets/imgs/blog-details/author-1.png" alt="image not found">
                                </div>
                                <div class="comment-item__content">
                                    <span class="name">Samuel Serif</span>
                                    <span class="date">march 26,2024 at 10:47 pm</span>
                                    <p>Phasellus ac eleifend nunc. Aenean efficitur, augue a tristique mollis, nulla leo
                                        dictum nunc, viverra magna sapien ut dolor.</p>
                                    <button class="rr-btn btn-gary">
                                        <span class="btn-wrap">
                                            <span class="text-one">Reply</span>
                                            <span class="text-two">Reply</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>


                        <div class="live-comment-widget mt-80 mt-xs-60">
                            <h3 class="mb-10">Leave a Comment</h3>
                            <p>Your email address will not be published. Required fields are marked *</p>

                            <div class="live-comment-widget__form">
                                <div class="row g-20">
                                    <div class="col-xl-6">
                                        <div class="live-comment-widget__form-input">
                                            <label>Name *</label>
                                            <input name="name" id="name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="live-comment-widget__form-input">
                                            <label>Email *</label>
                                            <input name="email" id="email" type="email">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="live-comment-widget__form-input">
                                            <label>Website</label>
                                            <input name="text" id="text" type="text">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="live-comment-widget__form-input">
                                            <div class="validation__wrapper-up position-relative">
                                                <label>Comment</label>
                                                <textarea name="textarea" id="textarea"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-between mb-40">
                                        <div class="live-comment-widget__agree">
                                            <input type="checkbox" class="form-check-input" id="agree">
                                            <label for="agree">Save my name, email, and website in this browser for the
                                                next time I comment.</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="rr-btn">
                                            <span class="btn-wrap">
                                                <span class="text-one">Post Comment
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 6H11" stroke="white" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M6 1L11 6L6 11" stroke="white" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                                <span class="text-two">Post Comment
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 6H11" stroke="white" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M6 1L11 6L6 11" stroke="white" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="sidebar sidebar-rr-sticky">
                        <div class="sidebar__widget">
                            <h4 class="sidebar__widget-title">Search here</h4>
                            <div class="sidebar__widget-search">
                                <div class="search__bar">
                                    <input type="text" id="search" placeholder="Search">
                                    <button>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.22221 13.4444C10.6586 13.4444 13.4444 10.6586 13.4444 7.22221C13.4444 3.78578 10.6586 1 7.22221 1C3.78578 1 1 3.78578 1 7.22221C1 10.6586 3.78578 13.4444 7.22221 13.4444Z"
                                                stroke="#767676" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M15.0005 15.0005L11.6172 11.6172" stroke="#767676"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__widget">
                            <h4 class="sidebar__widget-title">Category</h4>
                            <div class="sidebar__widget-category">
                                <a href="blog-details.html">Product Design <span>(02)</span></a>
                                <a href="blog-details.html">Mobile Solutions <span>(06)</span></a>
                                <a href="blog-details.html">Branding Design <span>(09)</span></a>
                                <a href="blog-details.html">Custom Solutions <span>(04)</span></a>
                                <a href="blog-details.html">Digital Marketing <span>(07)</span></a>
                            </div>
                        </div>
                        <div class="sidebar__widget">
                            <h4 class="sidebar__widget-title">Recent Posts</h4>
                            <div class="sidebar-post__wrapper">
                                <div class="sidebar__widget-post">
                                    <a href="blog-details.html" class="sidebar__widget-post__thum">
                                        <img src="assets/imgs/blog-details/post-1.jpg" class="img-fluid"
                                            alt="image not found">
                                    </a>
                                    <div class="sidebar__widget-post__content">
                                        <ul class="sidebar__widget-post__content-meta">
                                            <li>
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15 8C15 11.864 11.864 15 8 15C4.136 15 1 11.864 1 8C1 4.136 4.136 1 8 1C11.864 1 15 4.136 15 8Z"
                                                        stroke="#906E50" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M10.5962 10.2245L8.42623 8.92947C8.04823 8.70547 7.74023 8.16647 7.74023 7.72547V4.85547"
                                                        stroke="#906E50" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                24 April 2023
                                            </li>
                                        </ul>
                                        <a href="blog-details.html">
                                            <h6 class="sidebar__widget-post__content-title">Architecture is a Visual
                                                Art, and the Buildings Speak For.</h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="sidebar__widget-post">
                                    <a href="blog-details.html" class="sidebar__widget-post__thum">
                                        <img src="assets/imgs/blog-details/post-2.jpg" class="img-fluid"
                                            alt="image not found">
                                    </a>
                                    <div class="sidebar__widget-post__content">
                                        <ul class="sidebar__widget-post__content-meta">
                                            <li>
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15 8C15 11.864 11.864 15 8 15C4.136 15 1 11.864 1 8C1 4.136 4.136 1 8 1C11.864 1 15 4.136 15 8Z"
                                                        stroke="#906E50" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M10.5962 10.2245L8.42623 8.92947C8.04823 8.70547 7.74023 8.16647 7.74023 7.72547V4.85547"
                                                        stroke="#906E50" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                24 April 2023
                                            </li>
                                        </ul>
                                        <a href="blog-details.html">
                                            <h6 class="sidebar__widget-post__content-title">Reimagine Your Living Space
                                                with Modern Interior Concepts</h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="sidebar__widget-post">
                                    <a href="blog-details.html" class="sidebar__widget-post__thum">
                                        <img src="assets/imgs/blog-details/post-3.jpg" class="img-fluid"
                                            alt="image not found">
                                    </a>
                                    <div class="sidebar__widget-post__content">
                                        <ul class="sidebar__widget-post__content-meta">
                                            <li>
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15 8C15 11.864 11.864 15 8 15C4.136 15 1 11.864 1 8C1 4.136 4.136 1 8 1C11.864 1 15 4.136 15 8Z"
                                                        stroke="#906E50" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M10.5962 10.2245L8.42623 8.92947C8.04823 8.70547 7.74023 8.16647 7.74023 7.72547V4.85547"
                                                        stroke="#906E50" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                24 April 2023
                                            </li>
                                        </ul>
                                        <a href="blog-details.html">
                                            <h6 class="sidebar__widget-post__content-title">Living Experience with
                                                Luxurious Interiors.</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar__widget">
                            <h4 class="sidebar__widget-title">Tags</h4>
                            <div class="sidebar__widget-tags">
                                <div class="tags">
                                    <a href="blog-details.html">Branding</a>
                                    <a href="blog-details.html">UX Design</a>
                                    <a href="blog-details.html">Agency</a>
                                    <a href="blog-details.html">Company</a>
                                    <a href="blog-details.html">Web Design</a>
                                    <a href="blog-details.html">Creative</a>
                                    <a href="blog-details.html">Portfolio</a>
                                    <a href="blog-details.html">Illustration</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-details area end -->

    


</main>

@endsection