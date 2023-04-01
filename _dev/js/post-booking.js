// Data must contain:
// • Object Name
// • Date FROM
// • Date TO
// • Client NAME
// • Client SECOND NAME
// • Client EMAIL
// • Client TEL
// • Additional info

import fetch_init from "./fetch";

const post_booking = async (data) => {
    let ajaxBody = new FormData();
    ajaxBody.append("action", "post_booking");
    ajaxBody.append("obj", data.object);
    ajaxBody.append("from", data.from);
    ajaxBody.append("to", data.to);
    ajaxBody.append("name", data.name);
    ajaxBody.append("sname", data.sname);
    ajaxBody.append("email", data.email);
    ajaxBody.append("tel", data.tel);
    ajaxBody.append("info", data.info);

    let response = await fetch_init(ajaxBody);
    return response;
} 

export default post_booking;
