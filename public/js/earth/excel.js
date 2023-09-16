class Excel {

    constructor(mainData){
        this.mainData = mainData
     
    }

  create() {


    let mainData = this.mainData;


    var wb = XLSX.utils.book_new();
    wb.Props = {
      Title: "Earthquake Api",
      Subject: "earthquake",
      Author: "Yazdan",
      CreatedDate: new Date(2017, 12, 19),
    };

    wb.SheetNames.push("Test Sheet");
    var ws_data = 
      mainData
    ;
    var ws = XLSX.utils.aoa_to_sheet(ws_data);
    wb.Sheets["Test Sheet"] = ws;

    var wbout = XLSX.write(wb, { bookType: "xlsx", type: "binary" });
    function s2ab(s) {
      var buf = new ArrayBuffer(s.length);
      var view = new Uint8Array(buf);
      for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xff;
      return buf;
    }
    $("#btn-box #excel_btn").click(function () {
      saveAs(
        new Blob([s2ab(wbout)], { type: "application/octet-stream" }),
        "earthquake.xlsx"
      );
    });
  }
}
