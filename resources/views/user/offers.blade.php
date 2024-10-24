@include('user.layouts_new.header')

    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Offers
        </div>
        
    </div>
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule">
    
        @if(true)
            <div class="flex justify-center content-center" style="display: flex; justify-content: center; height: 100%; align-items: center; flex-direction: column; font-size: 15px;">
                You do not have any offer yet!
            </div>
        @endif


    </div>
    <!-- * App Capsule -->

@include('user.layouts_new.general-scripts')
@include('user.layouts_new.footer')