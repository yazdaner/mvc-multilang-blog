class Earthquake {
    constructor(starttime , endtime, minmagnitude, maxmagnitude, orderby, minlatitude, maxlatitude, minlongitude, maxlongitude, mindepth, maxdepth){
        this.starttime = starttime,
        this.endtime = endtime,
        this.minmagnitude = minmagnitude,
        this.maxmagnitude = maxmagnitude,
        this.orderby = orderby,
        this.minlatitude = minlatitude,
        this.maxlatitude = maxlatitude,
        this.minlongitude = minlongitude,
        this.maxlongitude = maxlongitude,
        this.mindepth = mindepth,
        this.maxdepth = maxdepth
    }

    async getEarthquake(){
        const response = await fetch(`https://earthquake.usgs.gov/fdsnws/event/1/query?format=geojson&starttime=${this.starttime}&endtime=${this.endtime}&mindepth=${this.mindepth}&maxdepth=${this.maxdepth}&minmagnitude=${this.minmagnitude}&maxmagnitude=${this.maxmagnitude}&minlatitude=${this.minlatitude}&maxlatitude=${this.maxlatitude}&minlongitude=${this.minlongitude}&maxlongitude=${this.maxlongitude}&orderby=${this.orderby}`)
        
        if(response.ok){
            const responseData = await response.json();
            return responseData;
        }else{
            throw Error(response.status);
        }
        
    }

    changeLocation(starttime , endtime, minmagnitude, maxmagnitude, orderby, minlatitude, maxlatitude, minlongitude, maxlongitude, mindepth, maxdepth){
        this.starttime = starttime,
        this.endtime = endtime,
        this.minmagnitude = minmagnitude,
        this.maxmagnitude = maxmagnitude,
        this.orderby = orderby,
        this.minlatitude = minlatitude,
        this.maxlatitude = maxlatitude,
        this.minlongitude = minlongitude,
        this.maxlongitude = maxlongitude,
        this.mindepth = mindepth,
        this.maxdepth = maxdepth
    }
    
  
}