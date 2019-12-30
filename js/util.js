function ToastSuccess(Message) {
    notify({

        //alert | success | error | warning | info
        type: "success", 
        title: "Sucesso",
        
        //custom message
        message: Message,
        
        position: {
        
          //right | left | center
          x: "right", 
        
          //top | bottom | center
          y: "bottom" 
        },
        
        // notify icon
        icon: '<img src="lib/notify/images/paper_plane.png" />', 
        
        //normal | full | small
        size: "normal", 
        
        overlay: false, 
        closeBtn: true, 
        overflowHide: false, 
        spacing: 20, 
        
        //default | dark-theme
        theme: "default", 
        
        //auto-hide after a timeout
        autoHide: true, 
        
        // timeout
        delay: 2000, 
        
        // callback functions
        onShow: null, 
        onClick: null, 
        onHide: null, 
        
        //custom template
        template: '<div class="notify"><div class="notify-text"></div></div>'
        
    });
}

function ToastFailure(Message) {
    notify({

        //alert | success | error | warning | info
        type: "error", 
        title: "Falha",
        
        //custom message
        message: Message,
        
        position: {
        
          //right | left | center
          x: "right", 
        
          //top | bottom | center
          y: "bottom" 
        },
        
        // notify icon
        icon: '<img src="lib/notify/images/paper_plane.png" />', 
        
        //normal | full | small
        size: "normal", 
        
        overlay: false, 
        closeBtn: true, 
        overflowHide: false, 
        spacing: 20, 
        
        //default | dark-theme
        theme: "default", 
        
        //auto-hide after a timeout
        autoHide: true, 
        
        // timeout
        delay: 4000, 
        
        // callback functions
        onShow: null, 
        onClick: null, 
        onHide: null, 
        
        //custom template
        template: '<div class="notify"><div class="notify-text"></div></div>'
        
    });
}

