import fetch_init from "./fetch";

const fetch_bookings = async (houseId) => {     
    const data = new FormData();
    data.append('action', 'get_bookings');
    data.append('houseID', houseId)

    let bookings = await fetch_init(data);
    return bookings;
}

export default fetch_bookings;