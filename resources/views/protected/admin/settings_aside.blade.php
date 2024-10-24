<div class="col-md-2 col-lg-2">
    <div class="sidebar o-auto">
        <div class="list-group list-group-transparent mb-0 mt-5">
            <h5><span class="icon mr-3"><i class="fe fe-disc"></i></span>General setting</h5>
        </div>
        <div class="list-group list-group-transparent mb-0">
            <a href="/admin/settings" class="list-group-item list-group-item-action" id="website_setting_nav">
                <span class="icon mr-3">
                    <i class="fe fe-globe"></i>
                </span>
                Website setting
            </a>
            <a href="#" class="list-group-item list-group-item-action ">
                <span class="icon mr-3">
                    <i class="fe fe-image"></i>
                </span>
                Website logo
            </a>
            <a href="/admin/settings/limit" class="list-group-item list-group-item-action " id="limit_setting_nav">
                <span class="icon mr-3">
                    <i class="fe fe-box"></i>
                </span>
                Limit setting
            </a>
            <a href="#" class="list-group-item list-group-item-action ">
                <span class="icon mr-3">
                    <i class="fe fe-bookmark"></i>
                </span>
                Cookie policy
            </a>
            <a href="#" class="list-group-item list-group-item-action ">
                <span class="icon mr-3">
                    <i class="fe fe-award"></i>
                </span>
                Terms policy
            </a>
            <a href="#" class="list-group-item list-group-item-action ">
                <span class="icon mr-3">
                    <i class="fe fe-dollar-sign"></i>
                </span>
                Currency
            </a>
            <a href="#" class="list-group-item list-group-item-action ">
                <span class="icon mr-3">
                    <i class="fe fe-command"></i>
                </span>
                Other
            </a>
        </div>
        <div class="list-group list-group-transparent mb-0 mt-5">
            <h5>
                <span class="icon mr-3">
                    <i class="fe fe-disc"></i>
                </span>
                Email
            </h5>
        </div>
        <div class="list-group list-group-transparent mb-0">
            <a href="#" class="list-group-item list-group-item-action ">
                <span class="icon mr-3">
                    <i class="fe fe-mail"></i>
                </span>
                Email setting
            </a>
            <a href="#" class="list-group-item list-group-item-action ">
                <span class="icon mr-3">
                    <i class="fe fe-file-text"></i>
                </span>
                Email template
            </a>
        </div>
        <div class="list-group list-group-transparent mb-0 mt-5">
            <h5>
                <span class="icon mr-3">
                    <i class="fe fe-disc"></i>
                </span>
                Integrations
            </h5>
        </div>
        <div class="list-group list-group-transparent mb-0">
            <a href="#" class="list-group-item list-group-item-action ">
                <span class="icon mr-3">
                    <i class="fe fe-file-text"></i>
                </span>
                Manual payments
            </a>
        </div>
    </div>
</div>

<script>
    if(location.pathname == '/admin/settings') {
        website_setting_nav.classList.add('active');
    } else if(location.pathname == '/admin/settings/limit') {
        limit_setting_nav.classList.add('active');
    }
</script>