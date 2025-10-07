async function postLTI(ses, name) {
    const response = await fetch(`/LTI/postLTI.php?name=${name}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'data': JSON.stringify(ses)
        })
    });
    if (!response.ok) {
        throw new Error(`Network response was not ok ${response.statusText}`);
    }
    return response.text();
}