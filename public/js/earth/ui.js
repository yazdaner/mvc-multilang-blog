class UI {
  constructor() {
    this.location = document.getElementById("w-location");
    this.main = document.getElementById("w-main");
    this.icon = document.getElementById("w-icon");
    this.temp = document.getElementById("w-temp");
    this.temp_min = document.getElementById("w-temp_min");
    this.temp_max = document.getElementById("w-temp_max");
    this.pressure = document.getElementById("w-pressure");
    this.humidity = document.getElementById("w-humidity");
    this.wind_speed = document.getElementById("w-wind_speed");
    this.lon = document.getElementById("w-lon");
    this.lat = document.getElementById("w-lat");
  }

  paint(result) {
    let count = result.features.length;
    document.querySelector("#TableBody").remove();
    const tbody = document.createElement("tbody");
    tbody.id = "TableBody";
    document.querySelector(".table").appendChild(tbody);


    let mainData = [['Longitude','Latitude','Depth','Mag','Date','Hour','Map','Place']];
    for (let i = 0; i < count; i++) {
      let long = result.features[i].geometry.coordinates[0];
      let lat = result.features[i].geometry.coordinates[1];
      let depth = result.features[i].geometry.coordinates[2];

      let mag = result.features[i].properties.mag;
      let url = result.features[i].properties.url + "/map";
      let place = result.features[i].properties.place;

      let timestamp = result.features[i].properties.time;
      let date = new Date(timestamp);
      let year = date.getFullYear(); // 2020
      let month = date.getMonth() + 1; // 4 (note zero index: Jan = 0, Dec = 11)
      let day = date.getDate(); // 9
      let hour = date.getHours(); // 14
      let minute = date.getMinutes(); // 28
      let second = date.getSeconds(); // 32
      let millisecond = date.getMilliseconds(); // 345
      let eqDate = year + "/" + month + "/" + day;
      let eqHour = hour + ":" + minute + ":" + second + ":" + millisecond;

      //create element
      const tr = document.createElement("tr");

      const th = document.createElement("th");
      th.appendChild(document.createTextNode(i + 1));
      const tdlong = document.createElement("td");
      tdlong.appendChild(document.createTextNode(long));
      const tdlat = document.createElement("td");
      tdlat.appendChild(document.createTextNode(lat));
      const tddepth = document.createElement("td");
      tddepth.appendChild(document.createTextNode(depth));
      const tdmag = document.createElement("td");
      tdmag.appendChild(document.createTextNode(mag));
      const tdDate = document.createElement("td");
      tdDate.appendChild(document.createTextNode(eqDate));
      const tdHour = document.createElement("td");
      tdHour.appendChild(document.createTextNode(eqHour));


      const a = document.createElement("a");

      a.setAttribute("href", url);
      a.setAttribute("target", "_blank");
      a.setAttribute("class", "btn btn-secondary");
      const icon = document.createElement("i");
      icon.setAttribute("class", 'bi bi-eye');
      a.appendChild(icon);

      const tdurl = document.createElement("td");
      tdurl.appendChild(a);

      const tdplace = document.createElement("td");
      tdplace.appendChild(document.createTextNode(place));

      tr.appendChild(th);
      tr.appendChild(tdlong);
      tr.appendChild(tdlat);
      tr.appendChild(tddepth);
      tr.appendChild(tdmag);
      tr.appendChild(tdDate);
      tr.appendChild(tdHour);
      tr.appendChild(tdurl);
      tr.appendChild(tdplace);

      document.querySelector("#TableBody").appendChild(tr);

      let dataArray = [long,lat,depth,mag,eqDate,eqHour,url,place];
      mainData.push(dataArray);
    }
    return mainData;

  }
}
