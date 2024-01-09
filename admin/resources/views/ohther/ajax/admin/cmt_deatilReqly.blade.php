<div class="cmt-item cmt-item-active">
    <div class="cmt-item-header">
        <div class="cmt-item-img">
            <img src="
            @if ($cmt_deatil->user_id===null)
                https://firebasestorage.googleapis.com/v0/b/doan-59ab4.appspot.com/o/admin-icon-strategy-collection-thin-600nw-2307398667.webp?alt=media&token=effed445-5211-4a87-a056-3fc6d5e06ad3
            @else
                @if ($cmt_deatil->user_linkImg==="")
                    https://firebasestorage.googleapis.com/v0/b/doan-59ab4.appspot.com/o/user-profile-icon-free-vector.jpg?alt=media&token=77b7ad6c-3d70-4090-8bab-6fae0b6e0bba
                @else
                    {{$cmt_deatil->user_linkImg}}
                @endif
            @endif
            " alt="">
        </div>
        <div class="cmt-item-infro-user flex_start">
          
            <p>
                @if ($cmt_deatil->user_id===null)
                    Quản trị viên <small>({{ $cmt_deatil->created_at }})</small>
                @else
                    {{$cmt_deatil->user_fullname}} <small>({{ $cmt_deatil->created_at }})</small>
                @endif

            </p>
        </div>
    </div>
    <div class="cmt-item-ifro">
        <p> {{$cmt_deatil->comment_context}} </p>
    </div>
</div>
