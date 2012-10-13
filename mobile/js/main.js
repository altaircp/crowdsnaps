var bb10HighlightColor,
    randomNumber;
randomNumber=Math.floor(Math.random()*100);
if (randomNumber > 90) {
    bb10HighlightColor = '#BA55D3';
} else if (randomNumber > 60) {
    bb10HighlightColor = '#00BC9F';
} else if (randomNumber > 30) {
    bb10HighlightColor = '#00A8DF';
} else {
    bb10HighlightColor = '#B2CC00';
}

// You must call init on bbUI before any other code loads.  
// If you want default functionality simply don't pass any parameters.. bb.init();
bb.init({bb10HighlightColor: bb10HighlightColor,
    bb10ActionBarDark: true,
    bb10ControlsDark: true,
    bb10ListsDark: false,
    bb10ForPlayBook: true,
    // Fires "before" styling is applied and "before" the screen is inserted in the DOM
    onscreenready: function(element, id) {
        if (id == 'dataOnLoad') {
            dataOnLoad_initialLoad(element);
        } else if (id == 'masterDetail') {
            masterDetail_initialLoad(element);
        }

        // Remove all titles "except" input and pill buttons screen if running on BB10
        if (bb.device.isBB10 && (id != 'input') && (id != 'pillButtons')) {
            var titles = element.querySelectorAll('[data-bb-type=title]');
            if (titles.length > 0) {
                titles[0].parentNode.removeChild(titles[0]);
            }
        }

    },
    // Fires "after" styling is applied and "after" the screen is inserted in the DOM
    ondomready: function(element, id) {
                    if (id == 'dataOnTheFly') {
                        dataOnTheFly_initialLoad(element);
                    }
                }
});
function openURL(url)
{
    var args = new blackberry.invoke.BrowserArguments(url);
    blackberry.invoke.invoke(blackberry.invoke.APP_BROWSER, args);
}

function login(){
    bb.pushScreen('grid.htm','home');
    openURL('http://api.crowdsnaps.com/login');
    //location.href="home.html"
}
function capture(){
    var args = new blackberry.invoke.CameraArguments();
    args.view = 1; // Video Recorder
    blackberry.invoke.invoke(blackberry.invoke.APP_CAMERA, args);  // Video Recorder Application
}
