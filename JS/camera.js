function startVideoFromCamer(){

    const specs = {video:{width:439}}

    navigator.mediaDevices.getUserMedia(specs).then(stream=>{

        const videoElement = document.querySelector("#video")
        videoElement.srcObject = stream

    }).cath(error=>{console.log(error)})

}

window.addEventListener("DOMContentLoaded", startVideoFromCamer)






