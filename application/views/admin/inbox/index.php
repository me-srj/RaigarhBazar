<!-- BEGIN: Content-->
    <div class="app-content content chat-application">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-area-wrapper">
        <div class="sidebar-left">
        <div class="sidebar"><!-- Admin user profile area -->
<div class="sidebar-content card">
  <span class="sidebar-close-icon">
    <i data-feather="x"></i>
  </span>
  <!-- Sidebar header start -->
  <div class="chat-fixed-search">
    <div class="d-flex align-items-center w-100">
      <div>
        <div class="avatar avatar-border">
          <img
            src="<?=base_url();?>/app-assets/admin/images/portrait/small/<?=$admin['image']?>"
            alt="admin"
            title="<?=$admin['name']?>"
            height="42"
            width="42"
          />
          <span class="avatar-status-online"></span>
        </div>
      </div>
      <div class="input-group input-group-merge ml-1 w-100">
        <div class="input-group-prepend">
          <span class="input-group-text round"><i data-feather="search" class="text-muted"></i></span>
        </div>
        <input
          type="text"
          class="form-control round"
          id="chat-search"
          placeholder="Search or start a new chat"
          aria-label="Search..."
          aria-describedby="chat-search"
        />
      </div>
    </div>
  </div>
  <!-- Sidebar header end -->

  <!-- Sidebar Users start -->
  <div id="users-list" class="chat-user-list-wrapper list-group">
    <h4 class="chat-list-title">Chats</h4>
    <ul class="chat-users-list chat-list media-list">
      
      
     
      <li class="no-results">
        <h6 class="mb-0">No Chats Found</h6>
      </li>
    </ul>
   
  </div>
  <!-- Sidebar Users end -->
</div>
<!--/ Chat Sidebar area -->

          </div>
        </div>
        <div class="content-right">
          <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><div class="body-content-overlay"></div>
<!-- Main chat area -->
<section class="chat-app-window">
  <!-- To load Conversation -->
  <div class="start-chat-area">
    <div class="mb-1 start-chat-icon">
      <i data-feather="message-square"></i>
    </div>
    <h4 class="sidebar-toggle start-chat-text">Start Conversation</h4>
  </div>
  <!--/ To load Conversation -->

  <!-- Active Chat -->
  <div class="active-chat d-none">
    <!-- Chat Header -->
    <div class="chat-navbar">
      <header class="chat-header">
        <div class="d-flex align-items-center">
          <div class="sidebar-toggle d-block d-lg-none mr-1" >
            <i data-feather="menu" class="font-medium-5"></i>
          </div>
          <div class="avatar avatar-border user-profile-toggle m-0 mr-1">
            <img src="<?=base_url();?>/app-assets/admin/images/avatars/default.png" alt="avatar" height="36" width="36" />
          </div>
          <h6 class="mb-0 username"></h6>
        </div>
        <a class="d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-call cursor-pointer d-sm-block d-none font-medium-2 mr-1"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
         </a>
      </header>
    </div>
    <!--/ Chat Header -->

    <!-- User Chat messages -->
    <div class="user-chats">
      <div class="chats">
        
      </div>
    </div>
    <!-- User Chat messages -->

    <!-- Submit Chat form -->
    <!--<form class="chat-app-form" action="javascript:void(0);" onsubmit="enterChat();">-->
    <!--  <div class="input-group input-group-merge mr-1 form-send-message">-->
    <!--    <input type="text" class="form-control message" placeholder="Type your message " />-->
    <!--  </div>-->
    <!--  <button type="button" class="btn btn-primary send" onclick="enterChat();">-->
    <!--    <i data-feather="send" class="d-lg-none"></i>-->
    <!--    <span class="d-none d-lg-block">Send</span>-->
    <!--  </button>-->
    <!--</form>-->
    <!--/ Submit Chat form -->
  </div>
  <!--/ Active Chat -->
</section>
<!--/ Main chat area -->

<!-- User Chat profile right area -->
<div class="user-profile-sidebar">
  <header class="user-profile-header">
    <span class="close-icon">
      <i data-feather="x"></i>
    </span>
    <!-- User Profile image with name -->
    <div class="header-profile-sidebar">
      <div class="avatar box-shadow-1 avatar-border avatar-xl">
        <img src="<?=base_url();?>/app-assets/admin/images/avatars/default.png" alt="user_avatar" height="70" width="70" />
      </div>
      <h4 class="chat-user-name"></h4>
    </div>
    <!--/ User Profile image with name -->
  </header>
  <div class="user-profile-sidebar-area">
    <!-- About User -->
    <!-- User's personal information -->
    <div class="personal-info">
      <h6 class="section-label mb-1 mt-3">Personal Information</h6>
      <ul class="list-unstyled">
        <li class="mb-1">
          <i data-feather="mail" class="font-medium-2 mr-50"></i>
          <span class="align-middle" id="user-email-p"></span>
        </li>
        <li class="mb-1">
          <i data-feather="phone-call" class="font-medium-2 mr-50"></i>
          <span class="align-middle" id="user-mobile-p"></span>
        </li>
      </ul>
    </div>
    <!--/ User's personal information -->
    <!--/ User's Links -->
  </div>
</div>
<!--/ User Chat profile right area -->

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->
    <script>
        $(document).ready(function()
        {
           get_chats(); 
        })
        function get_chats(){
    $.ajax({
   url:"<?=base_url()?>admin/get_chats",
   method: "POST",
   cache:false,
   success:function(data)
   {
      // console.log(data);
     $('.chat-list').html(data);
   }
  });
        }
        function viewmsg(mobile,name,email){
            $.ajax({
   url:"<?=base_url()?>admin/get_chats_msg",
   method: "POST",
   cache:false,
   data:{'mobile':mobile},
   success:function(data)
   {
    //   console.log(data);
      $(".chats").html(data);
    $('.username').html(name);
    $('.user-profile-toggle').attr("onclick","getde('"+mobile+"','"+name+"','"+email+"')");
    $(".start-chat-area").attr("class","start-chat-area d-none");
    $(".active-chat").attr("class","active-chat");
    $(".sidebar-content").attr("class","sidebar-content card");
    get_chats();
   }
  })
        }
        function getde(mobile,name,email){
            $(".chat-user-name").html(name);
            $("#user-email-p").html('<a href=mailto:'+email+'>'+email+'</a>');
            $("#user-mobile-p").html('<a href=tel:+91'+mobile+'>'+mobile+'</a>');
            // console.log(mobile+name+email);
            
        }
    </script>