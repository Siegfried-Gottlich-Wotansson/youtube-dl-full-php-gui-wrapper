	// var musicserver = {

    // DocOnLoad: function (oDoc) {
        // try {
            // if (oDoc != null && oDoc.body != null && oDoc.location != null && oDoc.getElementById("ytmp3converter_musicserver") == null) {

                // if (musicserver.IsYoutubeUrl(oDoc)) {
                    // var oDivCont = oDoc.getElementById("top-level-buttons");
                    // if (oDivCont != null) {
                        // var oCommandButton = musicserver.GetCommandButton();
						// oDivCont.appendChild(oCommandButton);
                    // }
                // }
            // }
        // }
        // catch (e) {
            // alert("Problems on musicserver.DocOnLoad. " + e);
        // }
    // },
	
	// GetCommandButton: function () {
        // try {
            // var oCommandButton = document.createElement("div");
            // oCommandButton.id = "ytmp3converter_musicserver";
            // oCommandButton.className = "shit"; //yt-uix-button
            // oCommandButton.setAttribute("title", "Convert to MP3 with music-server.ml");
            // oCommandButton.innerHTML = "&nbsp;Download";
            // oCommandButton.addEventListener("click", function (e) {musicserver.OnButtonClick(e)}, true);
            // return oCommandButton;
        // } catch (e) {
            // alert("Problems with musicserver.GetCommandButton. " + e);
        // }
    // },
	
    // OnButtonClick: function (e) {
        // window.open('http://music-server.ml/download.php?link='+window.location.href, '_blank');
    // },

    

    // IsYoutubeUrl: function (oDoc) {
        // if (oDoc.location.toString().toLowerCase().indexOf("youtube.com") != -1 && oDoc.location.toString().toLowerCase().indexOf("watch?v=") != -1)
            // return true;
        // else
            // return false;
    // }
// };

// window.addEventListener("DOMNodeInserted", function() {musicserver.DocOnLoad(document);}, true);
document.addEventListener('DOMContentLoaded', function(){ 
var target = document.getElementById('info-contents');
 
// create an observer instance
var observer = new MutationObserver(function(mutations) {
  mutations.forEach(function(mutation) {
    console.log(mutation.type);
	alert('teasd');
  });    
});
 
// configuration of the observer:
var config = { attributes: true, childList: true, characterData: true };
 
// pass in the target node, as well as the observer options
observer.observe(target, config);
 
// later, you can stop observing
observer.disconnect();
});