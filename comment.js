let totalComments = 0;
async function createComments(containerId, numOfComments) {
    if(totalComments > 20) {
        return;
    }
    let response = await fetch("./commentimport.html");
    let text = await response.text();
    

    for(let i=0;i<numOfComments;i++) {
        document.getElementById(containerId).innerHTML += text
        .replace("USERTEXT", returnRandomWord)
        .replace("BODYTEXT", returnText(Math.random() * 50))
        .replace("REPLYID", "reply" + totalComments);
        if(Math.floor(Math.random()*10)%2==0) {
            createComments("reply" + totalComments, 1);
        }
        totalComments++;
    }
}

function returnText(numOfWords) {
    let words = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Velit laoreet id donec ultrices tincidunt arcu non. Viverra ipsum nunc aliquet bibendum enim facilisis gravida neque convallis. Consectetur a erat nam at lectus urna duis convallis. In arcu cursus euismod quis viverra nibh cras pulvinar. Facilisi etiam dignissim diam quis enim lobortis. Pharetra magna ac placerat vestibulum lectus. Leo a diam sollicitudin tempor id eu nisl nunc mi. Tincidunt praesent semper feugiat nibh sed pulvinar. Non arcu risus quis varius quam quisque id diam vel. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. Cursus risus at ultrices mi tempus imperdiet nulla. Faucibus interdum posuere lorem ipsum dolor sit amet consectetur. Scelerisque mauris pellentesque pulvinar pellentesque habitant morbi. Morbi tincidunt ornare massa eget egestas purus viverra accumsan in. Placerat in egestas erat imperdiet sed. Purus non enim praesent elementum facilisis leo vel. Nisi scelerisque eu ultrices vitae auctor. Risus nullam eget felis eget nunc lobortis mattis.".split(" ");
    let returnText = "";
    for(let i=0;i<numOfWords;i++) {
        returnText += words[i] + " ";
    }
    return returnText;
}

function returnRandomWord() {
    let words = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Velit laoreet id donec ultrices tincidunt arcu non. Viverra ipsum nunc aliquet bibendum enim facilisis gravida neque convallis. Consectetur a erat nam at lectus urna duis convallis. In arcu cursus euismod quis viverra nibh cras pulvinar. Facilisi etiam dignissim diam quis enim lobortis. Pharetra magna ac placerat vestibulum lectus. Leo a diam sollicitudin tempor id eu nisl nunc mi. Tincidunt praesent semper feugiat nibh sed pulvinar. Non arcu risus quis varius quam quisque id diam vel. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. Cursus risus at ultrices mi tempus imperdiet nulla. Faucibus interdum posuere lorem ipsum dolor sit amet consectetur. Scelerisque mauris pellentesque pulvinar pellentesque habitant morbi. Morbi tincidunt ornare massa eget egestas purus viverra accumsan in. Placerat in egestas erat imperdiet sed. Purus non enim praesent elementum facilisis leo vel. Nisi scelerisque eu ultrices vitae auctor. Risus nullam eget felis eget nunc lobortis mattis.".split(" ");
    return words[Math.floor(Math.random() * words.length)];
}