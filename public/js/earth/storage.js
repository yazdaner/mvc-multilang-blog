class Storage{

    constructor(){
        
    

        this.starttime;
        this.endtime;
        this.minmagnitude; 
        this.maxmagnitude;
        this.orderby;

        this.minlatitude;
        this.maxlatitude;
        this.minlongitude;
        this.maxlongitude;

        this.mindepth;
        this.maxdepth;

        this.defaulMinlatitude = 28;
        this.defaultMaxlatitude = 38;
        this.defaultMinlongitude = 52;
        this.defaultMaxlongitude = 65;
    }

    getLocationData(){
        if( localStorage.getItem('minlatitude') === null ){
            this.minlatitude = this.defaulMinlatitude;
        }else{
            this.minlatitude = localStorage.getItem('minlatitude');
        }

        if( localStorage.getItem('maxlatitude') === null ){
            this.maxlatitude = this.defaultMaxlatitude;
        }else{
            this.maxlatitude = localStorage.getItem('maxlatitude');
        }

        if( localStorage.getItem('minlongitude') === null ){
            this.minlongitude = this.defaultMinlongitude;
        }else{
            this.minlongitude = localStorage.getItem('minlongitude');
        }

        if( localStorage.getItem('maxlongitude') === null ){
            this.maxlongitude = this.defaultMaxlongitude;
        }else{
            this.maxlongitude = localStorage.getItem('maxlongitude');
        }

        return {
            starttime : this.starttime,
            endtime : this.endtime,
            minmagnitude : this.minmagnitude,
            maxmagnitude : this.maxmagnitude,
            orderby : this.orderby,
            minlatitude : this.minlatitude,
            maxlatitude : this.maxlatitude,
            minlongitude : this.minlongitude,
            maxlongitude : this.maxlongitude,
            mindepth : this.mindepth,
            maxdepth : this.maxdepth
        }
    }


    setLocationData(starttime , endtime, minmagnitude, maxmagnitude, orderby, minlatitude, maxlatitude, minlongitude, maxlongitude, mindepth, maxdepth){

        localStorage.setItem('starttime' , starttime);
        localStorage.setItem('endtime' , endtime);
        localStorage.setItem('minmagnitude' , minmagnitude);
        localStorage.setItem('maxmagnitude' , maxmagnitude);
        localStorage.setItem('orderby' , orderby);
        localStorage.setItem('minlatitude' , minlatitude);
        localStorage.setItem('maxlatitude' , maxlatitude);
        localStorage.setItem('minlongitude' , minlongitude);
        localStorage.setItem('maxlongitude' , maxlongitude);
        localStorage.setItem('mindepth' , mindepth);
        localStorage.setItem('maxdepth' , maxdepth);
        
    }
}