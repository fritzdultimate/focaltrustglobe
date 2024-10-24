@include('visitor.template.header')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url(assets/images/background/bg-17.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>Affordable Pricing</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li>Pricing & Plans</li>
                    </ul>
                </div>                    
            </div>
        </div>
    </section>
    <!-- Page Title -->

    <!-- Pricing Section -->
    <section class="pricing-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Flexible Plans for all </h2>
                <div class="text-decoration">
                    <span class="left"></span>
                    <span class="right"></span>
                </div>
            </div>
            <div class="text-center">
                <div class="pricing-btn">
                    <ul class="nav nav-tabs tab-btn-style-one" role="tablist">
                        @foreach($parent_plans as $id => $plan)
                            <li class="nav-item">
                                <a class="nav-link {{ $id == 0 ? 'active' : ''}}" id="price-tab-{{ $plan->id }}-area" data-toggle="tab" href="#price-tab-{{ $plan->id }}" role="tab" aria-controls="price-tab-{{ $plan->id }}" aria-selected="true">
                                    {{ ucfirst($plan->name) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>                
            <div class="pricing-content">
                <!-- Tab panes -->
                <div class="tab-content wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1200ms">
                    @foreach($parent_plans as $id => $plan)
                        <div class="tab-pane fadeInUp animated {{ $id == 0 ? 'active' : ''}}" id="price-tab-{{ $plan->id }}" role="tabpanel" aria-labelledby="price-tab-{{ $plan->id }}">
                        @if(count($parent_plans) > 1)
                            <h3>Switch to other plan by clicking above tab.</h3>
                        @endif
                        <div class="wrapper-box">
                            <div class="row m-0">
                                @foreach($child_plans as $id => $c_plan)
                                    @if($c_plan->parent_plan->id == $plan->id)
                                        <div class="col-lg-4 pricing-block animated fadeInUp" data-wow-delay="200ms" data-wow-duration="1200ms">
                                    <div class="inner-box">
                                        <div class="top-content">
                                            <div class="row m-0 justify-content-between">
                                                <div class="category">
                                                    {{ ucfirst($c_plan->name) }}
                                                </div>
                                                <div class="price">{{ $c_plan->interest_rate }}<sup><span>%</span></sup><sub>/daily</sub></div>
                                            </div>
                                        </div>
                                        <div class="lower-content">
                                            @if($c_plan->minimum_amount < 200)
                                                <h5>Most Recommended</h5>
                                            @elseif($c_plan->minimum_amount < 1500)
                                            <h5>Popular</h5>
                                            @else
                                            <h5>V.I.P</h5>
                                            @endif
                                            
                                            
                                            <h4>Power of choice is untrammelled and <br>do what you like best.</h4>
                                            <ul>
                                                <li><i class="flaticon-tick"></i>{{$c_plan->duration}} days to complete</li>
                                                <li><i class="flaticon-tick"></i>Minimum of ${{$c_plan->minimum_amount}}</li>
                                                <li><span><i class="flaticon-right-arrow"></i>No Commission</span></li>
                                                <li><span><i class="flaticon-right-arrow"></i>No hidden charges</span></li>
                                                <li><i class="flaticon-tick"></i>24/7 available support</li>
                                            </ul>
                                            <div class="link-btn">
                                                <a href="/register" class="theme-btn btn-style-two">
                                                    <span class="btn-title">
                                                        Get Started 
                                                        </span>
                                                </a>
                                            </div>
                                            <div class="hint"><span>*</span> No credit card required</div>
                                        </div>
                                    </div>
                                </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    
    <!-- Feature Section Two -->
    <section class="feature-section-two style-two">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-6 feature-block-two style-two">
                    <div class="shape-box">
                        <div class="inner-box">
                            <div class="icon"><img src="assets/images/icons/icon-9.png" alt=""></div>
                            <h4>Become a Partner of {{ env("SITE_NAME") }}</h4>
                            <div class="text">To take a trivial example, which of us undertakes <br>laborious physical exercise.</div>
                        </div>
                    </div>
                        
                </div>
                <div class="col-lg-6 feature-block-two style-two">
                    <div class="shape-box">
                        <div class="inner-box">
                            <div class="icon"><img src="assets/images/icons/icon-10.png" alt=""></div>
                            <h4>Career Opportunities in {{ env("SITE_NAME") }}</h4>
                            <div class="text">Who chooses to enjoy a pleasure that has no one <br>annoying consequences.</div>
                        </div>
                    </div>               
                </div>
            </div>
        </div>
    </section>
@include('visitor.template.footer')