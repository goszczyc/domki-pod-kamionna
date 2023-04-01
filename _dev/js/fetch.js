const fetch_init = async (data) => {
  let response = fetch(adminUrl.ajaxurl, {
    method: "POST",
    body: data,
    credentials: "same-origin",
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Ajax didn't work");
      }
      return response.json();
    })
    .then((json) => {
      return json;
    })
    .catch((err) => {
      console.log(err);
      return null;
    });

  // Return back-end err response
  if (response["err"]) {
    console.log(response["msg"]);
    return null;
  }
  return response;
};

export default fetch_init;
