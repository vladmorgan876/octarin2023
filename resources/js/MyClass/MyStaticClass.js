
import axios from "axios";
  export  class  MyStaticClass {
  static Helper(path,obj){
          axios.post(path,obj)
              .then((response) => {
                      debugger;
                      var message = response.data.message;
                      if (message==="All right"){
                          alert("Уважаемый "+obj.messageFrom+" ваше сообщение доставлено");
                         // window.location.href = "/";
                      }
                  }
             )
  }
    static showZoomImage(){
        document.getElementsByClassName("zoomPicture")[0].style.display="none";
        setTimeout(function (){document.getElementsByClassName("zoomPicture")[0].style.display="block";},1)
    }
    static closeZoomImage(){
        document.getElementsByClassName("zoomPicture")[0].style.display="none";
    }
}
