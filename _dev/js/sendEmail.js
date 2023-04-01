import fetch_init from "./fetch";

const send_email = async (data) => {
  let ajaxBody = new FormData();
  ajaxBody.append("action", "send_booking_mail");
  ajaxBody.append("obj", data.object);
  ajaxBody.append("from", data.from);
  ajaxBody.append("to", data.to);
  ajaxBody.append("name", data.name);
  ajaxBody.append("sname", data.sname);
  ajaxBody.append("email", data.email);
  ajaxBody.append("tel", data.tel);
  ajaxBody.append("info", data.info);

  let response = await fetch_init(ajaxBody);
  if (response=="success") return true;
  return false;
};

export default send_email;
