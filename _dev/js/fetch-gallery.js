import fetch_init from "./fetch";

const fetch_gallery = async (houseId) => {
    const data = new FormData();
    data.append('action', 'get_gallery');
    data.append('houseID', houseId)

    let gallery = await fetch_init(data);
    return gallery;
}

export default fetch_gallery;