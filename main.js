console.log("testing")

window.onload = function () {
    var setting = {
      query: "Jl. Patimura No.37, Klojen, Kota Malang, Jawa Timur 65111, Indonesia",
      width: "100%",
      height: 200,
      satellite: false,
      zoom: 13,
      placeId: "ChIJfa0B9joo1i0RV1WXk-MOg10",
      cid: "0x5d830ee393975557",
      coords: [-7.973071799999999, 112.6347548],
      cityUrl: "/indonesia/malang-39952",
      lang: "id",
      queryString: "Jl. Patimura No.37, Klojen, Kota Malang, Jawa Timur 65111, Indonesia",
      centerCoord: [-7.973071799999999, 112.6347548],
      id: "map-9cd199b9cc5410cd3b1ad21cab2e54d3",
      embed_id: "1213563",
    };
    var d = document;
    var s = d.createElement("script");
    s.src = "https://1map.com/js/script-for-user.js?embed_id=1213563";
    s.async = true;
    s.onload = function (e) {
      window.OneMap.initMap(setting);
    };
    var to = d.getElementsByTagName("script")[0];
    to.parentNode.insertBefore(s, to);
  };
  
  