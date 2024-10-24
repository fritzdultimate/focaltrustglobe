@include('user.layouts_new.header')

    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Referrals
        </div>
        
    </div>
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule">
        @if($referral_count > 0)
        <div class="listview-title mt-2">Users you invited to {{ env('SITE_NAME') }}</div>
        @endif
        <!-- Users -->
        <ul class="listview image-listview">
            @foreach($referrals as $user)
            <li>
                <a href="#" class="item">
                    <img src="{{ $user->picture ? asset($user->picture) : asset('app_assets/img/sample/avatar/avatar1.png') }}" alt="image" class="image">
                    <div class="in">
                        <div>{{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}</div>
                        @if($user->invested)
                            <ion-icon class="font-size: 20px" name="checkmark-outline" style="color: green"></ion-icon>
                        @endif
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
        <!-- * Users -->

        

        @if($referral_count == 0)
            <div class="flex justify-center content-center" style="display: flex; justify-content: center; height: 100%; align-items: center; flex-direction: column; font-size: 15px;">
                You do not have any referral yet!
            </div>
        @endif


    </div>
    <!-- * App Capsule -->

@include('user.layouts_new.general-scripts')
@include('user.layouts_new.footer')