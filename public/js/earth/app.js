const storage = new Storage();

const earthquakeLocation =  storage.getLocationData();

const earthquake = new Earthquake(earthquakeLocation.starttime , earthquakeLocation.endtime, earthquakeLocation.minmagnitude, earthquakeLocation.maxmagnitude, earthquakeLocation.orderby, earthquakeLocation.minlatitude, earthquakeLocation.maxlatitude, earthquakeLocation.minlongitude, earthquakeLocation.maxlongitude, earthquakeLocation.mindepth, earthquakeLocation.maxdepth);

const ui = new UI();

document.addEventListener('DOMContentLoaded',getEarthquake);

document.getElementById('w-change-btn').addEventListener('click' , changeLocation);

function changeLocation(){

    const starttime = document.getElementById('starttime').value;
    const endtime = document.getElementById('endtime').value;
    const minmagnitude = document.getElementById('minmagnitude').value;
    const maxmagnitude = document.getElementById('maxmagnitude').value;
    const orderby = document.getElementById('orderby').value;
    let minlatitude = document.getElementById('minlatitude').value;
    let maxlatitude = document.getElementById('maxlatitude').value;
    let minlongitude = document.getElementById('minlongitude').value;
    let maxlongitude = document.getElementById('maxlongitude').value;
    const mindepth = document.getElementById('mindepth').value;
    const maxdepth = document.getElementById('maxdepth').value;


    if(minlatitude=='' & maxlatitude=='' & minlongitude=='' & maxlongitude=='' ){
        minlatitude = 28;
        maxlatitude = 38;
        minlongitude = 52;
        maxlongitude = 65;

    }


    earthquake.changeLocation(starttime , endtime, minmagnitude, maxmagnitude, orderby, minlatitude, maxlatitude, minlongitude, maxlongitude, mindepth, maxdepth);

    storage.setLocationData(starttime , endtime, minmagnitude, maxmagnitude, orderby, minlatitude, maxlatitude, minlongitude, maxlongitude, mindepth, maxdepth);

    getEarthquake();

}

function getEarthquake(){
    earthquake.getEarthquake()
                .then( result => {
                    // console.log(result);
                    let mainData = ui.paint(result);
                    const excel = new Excel(mainData);
                    excel.create();

                } )

}
