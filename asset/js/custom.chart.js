 $(document).ready(function() {
    //SET CHART JS
    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels: ['2012/2013', '2013/2014', '2014/2015', '2015/2016', '2016/2017', '2017/2018'],
            datasets: [{
                data: [86, 114, 106, 106, 107, 111],
                label: "Teknik Audio Video",
                borderColor: "#3e95cd",
                fill: false
            }, {
                data: [282, 350, 411, 502, 635, 809],
                label: "Teknik Kendaraan Ringan",
                borderColor: "#8e5ea2",
                fill: false
            }, {
                data: [168, 170, 178, 190, 203, 276],
                label: "Teknik Komputer Jaringan",
                borderColor: "#3cba9f",
                fill: false
            }, {
                data: [40, 20, 10, 16, 24, 38],
                label: "Teknik Alat Berat",
                borderColor: "#e8c3b9",
                fill: false
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Perkembangan Jumlah Pendaftar 5 Tahun Terakhir'
            }
        }
    });

    var div_tav = document.getElementById("dom-target-tav");
    var div_tkr = document.getElementById("dom-target-tkr");
    var div_tkj = document.getElementById("dom-target-tkj");
    var div_tab = document.getElementById("dom-target-tab");
    var div_sisatotal = document.getElementById("dom-target-sisatotal");
    var tav = div_tav.textContent;
    var tkr = div_tkr.textContent;
    var tkj = div_tkj.textContent;
    var tab = div_tab.textContent;
    var sisatotal = div_sisatotal.textContent;
    new Chart(document.getElementById("pie-chart"), {
        type: 'pie',
        data: {
            labels: ["Teknik Audio Video", "Teknik Kendaraan Ringan", "Teknik Komputer Jaringan", "Teknik Alat Berat", "Sisa Total Kuota"],
            datasets: [{
                label: "Jumlah Pendaftar",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#c45850", "#e8c3b9"],
                data: [tav, tkr, tkj, tab, sisatotal]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Jumlah Pendaftar Tiap Jurusan'
            }
        }
    });
});