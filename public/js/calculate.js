let fuzziStatus = {
    // umur
    umur: {
        fase1: false,
        fase2: false,
        fase3: false,
        fase4: false,
        fase5: false,
    },

    // berat
    beratBadan: {
        ringan: false,
        sedang: false,
        berat: false,
    },

    // tinggi
    tinggiBadan: {
        rendah: false,
        sedang: false,
        tinggi: false,
    },
};

let nilai = {
    // umur
    umur: {
        fase1: 0.0,
        fase2: 0.0,
        fase3: 0.0,
        fase4: 0.0,
        fase5: 0.0,
    },

    // berat
    beratBadan: {
        ringan: 0.0,
        sedang: 0.0,
        berat: 0.0,
    },

    // tinggi
    tinggiBadan: {
        rendah: 0.0,
        sedang: 0.0,
        tinggi: 0.0,
    },
};

let giziStatus = {
    buruk: 0.0,
    kurang: 0.0,
    baik: 0.0,
    sedang: 0.0,
    lebih: 0.0,
};

$("#age").change(function () {
    console.log($("#last_weight").val());
    if (
        $("#last_height").val() != undefined &&
        $("#last_height").val() != "" &&
        $("#last_weight").val() != undefined &&
        $("#last_weight").val() != ""
    ) {
        calculate(
            parseFloat($("#age").val()),
            parseFloat($("#last_weight").val()),
            parseFloat($("#last_height").val())
        );
    }
});

$("#last_weight").change(function () {
    if (
        $("#age").val() != undefined &&
        $("#age").val() != "" &&
        $("#last_height").val() != undefined &&
        $("#last_height").val() != ""
    ) {
        calculate(
            parseFloat($("#age").val()),
            parseFloat($("#last_weight").val()),
            parseFloat($("#last_height").val())
        );
    }
});

$("#last_height").change(function () {
    if (
        $("#age").val() != undefined &&
        $("#age").val() != "" &&
        $("#last_weight").val() != undefined &&
        $("#last_weight").val() != ""
    ) {
        calculate(
            parseFloat($("#age").val()),
            parseFloat($("#last_weight").val()),
            parseFloat($("#last_height").val())
        );
    }
});

function calculate(umur, berat, tinggi) {
    // Inisialisasi Awal (Default)
    // Umur - Status;
    fuzziStatus.umur.fase1 = false;
    fuzziStatus.umur.fase2 = false;
    fuzziStatus.umur.fase3 = false;
    fuzziStatus.umur.fase4 = false;
    fuzziStatus.umur.fase5 = false;
    // Umur - Nilai
    nilai.umur.fase1 = 0;
    nilai.umur.fase2 = 0;
    nilai.umur.fase3 = 0;
    nilai.umur.fase4 = 0;
    nilai.umur.fase5 = 0;

    // Berat Badan - Status
    fuzziStatus.beratBadan.ringan = false;
    fuzziStatus.beratBadan.sedang = false;
    fuzziStatus.beratBadan.berat = false;
    // Berat Badan - Nilai
    nilai.beratBadan.ringan = 0;
    nilai.beratBadan.sedang = 0;
    nilai.beratBadan.berat = 0;

    // Tinggi Badan - Status
    fuzziStatus.tinggiBadan.rendah = false;
    fuzziStatus.tinggiBadan.sedang = false;
    fuzziStatus.tinggiBadan.tinggi = false;
    // TInggi Badan - Nilai
    nilai.tinggiBadan.rendah = 0;
    nilai.tinggiBadan.sedang = 0;
    nilai.tinggiBadan.tinggi = 0;

    // Gizi Status Reset
    giziStatus.buruk = 0;
    giziStatus.kurang = 0;
    giziStatus.sedang = 0;
    giziStatus.baik = 0;
    giziStatus.lebih = 0;

    himpunanUmur(umur.toFixed(2));
    himpunanBerat(berat.toFixed(2));
    himpunanTinggi(tinggi.toFixed(2));

    inferensiFuzzi();
    let nilaiGizi = 0.0;
    nilaiGizi = defuzzifikasi();

    console.log(nilaiGizi);
    console.log(fuzziStatus);

    let hasil = hasilGizi(nilaiGizi);

    console.log(hasil);

    $("#gizi_score").val(hasil.nilai);
    $("#gizi_status").val(hasil.status);
}

function himpunanUmur(umur) {
    console.log("Umur " + umur);
    // Fase 1
    if (umur <= 12) {
        fuzziStatus.umur.fase1 = true;
        console.log(umur + " Fase 1");
        if (umur <= 6) {
            nilai.umur.fase1 = 1;
        } else if (umur >= 6 && umur <= 12) {
            nilai.umur.fase1 = (12 - umur) / 6;
        } else if (umur >= 12) {
            nilai.umur.fase1 = 0;
        }
    }

    // Fase 2
    if (umur >= 6 && umur <= 24) {
        fuzziStatus.umur.fase2 = true;
        console.log(umur + " Fase 2");
        if (umur <= 6) {
            nilai.umur.fase2 = 0;
        } else if (umur >= 6 && umur <= 12) {
            nilai.umur.fase2 = (umur - 6) / 6;
        } else if (umur >= 12 && umur <= 24) {
            nilai.umur.fase2 = (24 - umur) / 12;
        }
    }

    // Fase 3
    if (umur >= 12 && umur <= 36) {
        fuzziStatus.umur.fase3 = true;
        console.log(umur + " Fase 3");
        if (umur <= 12) {
            nilai.umur.fase3 = 0;
        } else if (umur >= 12 && umur <= 24) {
            nilai.umur.fase3 = (umur - 12) / 12;
        } else if (umur >= 24 && umur <= 36) {
            nilai.umur.fase3 = (36 - umur) / 12;
        }
    }

    // Fase 4
    if (umur >= 24 && umur <= 48) {
        fuzziStatus.umur.fase4 = true;
        console.log(umur + " Fase 4");
        if (umur <= 24) {
            nilai.umur.fase4 = 0;
        } else if (umur >= 24 && umur <= 36) {
            nilai.umur.fase4 = (umur - 24) / 12;
        } else if (umur >= 36 && umur <= 48) {
            nilai.umur.fase4 = (48 - umur) / 12;
        }
    }

    // Fase 5
    if (umur >= 36) {
        fuzziStatus.umur.fase5 = true;
        console.log(umur + " Fase 5");
        if (umur <= 36) {
            nilai.umur.fase5 = 0;
        } else if (umur >= 36 && umur <= 48) {
            nilai.umur.fase5 = (umur - 36) / 12;
        } else if (umur >= 48) {
            nilai.umur.fase5 = 1;
        }
    }
}

function himpunanBerat(berat) {
    console.log("Berat " + berat);
    // Ringan
    if (berat <= 12) {
        fuzziStatus.beratBadan.ringan = true;
        if (berat <= 7) {
            nilai.beratBadan.ringan = 1;
        } else if (berat >= 7 && berat <= 12) {
            nilai.beratBadan.ringan = (12 - berat) / 7;
        } else if (berat >= 12) {
            nilai.beratBadan.ringan = 0;
        }
    }

    // Sedang
    if (berat >= 7 && berat <= 18) {
        fuzziStatus.beratBadan.sedang = true;
        if (berat <= 7) {
            nilai.beratBadan.sedang = 0;
        } else if (berat >= 7 && berat <= 12) {
            nilai.beratBadan.sedang = (berat - 7) / 7;
        } else if (berat >= 12 && berat <= 18) {
            nilai.beratBadan.sedang = 1;
        }
    }

    // Berat
    if (berat >= 12) {
        fuzziStatus.beratBadan.berat = true;
        if (berat <= 12) {
            nilai.beratBadan.berat = 0;
        } else if (berat >= 12 && berat <= 18) {
            nilai.beratBadan.berat = (berat - 12) / 6;
        } else if (berat >= 18) {
            nilai.beratBadan.berat = 1;
        }
    }
}

function himpunanTinggi(tinggi) {
    console.log("Tinggi " + tinggi);
    // Rendah
    if (tinggi <= 74) {
        fuzziStatus.tinggiBadan.rendah = true;
        if (tinggi <= 48) {
            nilai.tinggiBadan.rendah = 1;
        } else if (tinggi >= 48 && tinggi <= 74) {
            nilai.tinggiBadan.rendah = (74 - tinggi) / 26;
        } else if (tinggi >= 74) {
            nilai.tinggiBadan.rendah = 0;
        }
    }

    // Sedang
    if (tinggi >= 48 && tinggi <= 100) {
        fuzziStatus.tinggiBadan.sedang = true;
        if (tinggi <= 48) {
            nilai.tinggiBadan.sedang = 0;
        } else if (tinggi >= 48 && tinggi <= 74) {
            nilai.tinggiBadan.sedang = (tinggi - 48) / 26;
        } else if (tinggi >= 74 && tinggi <= 100) {
            nilai.tinggiBadan.sedang = (100 - tinggi) / 26;
        }
    }

    // Tinggi
    if (tinggi >= 74) {
        fuzziStatus.tinggiBadan.tinggi = true;
        if (tinggi <= 74) {
            nilai.tinggiBadan.tinggi = 0;
        } else if (tinggi >= 74 && tinggi <= 120) {
            nilai.tinggiBadan.tinggi = (tinggi - 74) / 26;
        } else if (tinggi >= 120) {
            nilai.tinggiBadan.tinggi = 1;
        }
    }
}

function inferensiFuzzi() {
    let nilaiFuzzi;
    let giziFuzzi;
    // Umur Fase 1
    if (fuzziStatus.umur.fase1 == true) {
        // BB Ringan
        if (fuzziStatus.beratBadan.ringan == true) {
            // TB Rendah
            if (fuzziStatus.tinggiBadan.rendah == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase1 - Ringan - Rendah");
                console.log(
                    nilai.umur.fase1 +
                        ", " +
                        nilai.beratBadan.ringan +
                        ", " +
                        nilai.tinggiBadan.rendah
                );
                if (
                    nilai.umur.fase1 < nilai.beratBadan.ringan &&
                    nilai.umur.fase1 < nilai.tinggiBadan.rendah
                ) {
                    nilaiFuzzi = nilai.umur.fase1;
                } else if (nilai.beratBadan.ringan < nilai.tinggiBadan.rendah) {
                    nilaiFuzzi = nilai.beratBadan.ringan;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.rendah;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.baik) {
                    giziStatus.baik = nilaiFuzzi;
                }
            }

            // TB Sedang
            if (fuzziStatus.tinggiBadan.sedang == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase1 - Ringan - Sedang");
                console.log(
                    nilai.umur.fase1 +
                        ", " +
                        nilai.beratBadan.ringan +
                        ", " +
                        nilai.tinggiBadan.sedang
                );
                if (
                    nilai.umur.fase1 < nilai.beratBadan.ringan &&
                    nilai.umur.fase1 < nilai.tinggiBadan.sedang
                ) {
                    nilaiFuzzi = nilai.umur.fase1;
                } else if (nilai.beratBadan.ringan < nilai.tinggiBadan.sedang) {
                    nilaiFuzzi = nilai.beratBadan.ringan;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.sedang;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.baik) {
                    giziStatus.baik = nilaiFuzzi;
                }
            }

            // TB Tinggi
            if (fuzziStatus.tinggiBadan.tinggi == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase1 - Ringan - Tinggi");
                console.log(
                    nilai.umur.fase1 +
                        ", " +
                        nilai.beratBadan.ringan +
                        ", " +
                        nilai.tinggiBadan.tinggi
                );
                if (
                    nilai.umur.fase1 < nilai.beratBadan.ringan &&
                    nilai.umur.fase1 < nilai.tinggi
                ) {
                    nilaiFuzzi = nilai.umur.fase1;
                } else if (nilai.beratBadan.ringan < nilai.tinggi) {
                    nilaiFuzzi = nilai.beratBadan.ringan;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.tinggi;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.sedang) {
                    giziStatus.sedang = nilaiFuzzi;
                }
            }
        }

        // BB Sedang
        if (fuzziStatus.beratBadan.sedang == true) {
            // TB Rendah
            if (fuzziStatus.tinggiBadan.rendah == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase1 - Sedang - Rendah");
                console.log(
                    nilai.umur.fase1 +
                        ", " +
                        nilai.beratBadan.sedang +
                        ", " +
                        nilai.tinggiBadan.rendah
                );
                if (
                    nilai.umur.fase1 < nilai.beratBadan.sedang &&
                    nilai.umur.fase1 < nilai.tinggiBadan.rendah
                ) {
                    nilaiFuzzi = nilai.umur.fase1;
                } else if (nilai.beratBadan.sedang < nilai.tinggiBadan.rendah) {
                    nilaiFuzzi = nilai.beratBadan.sedang;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.rendah;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.lebih) {
                    giziStatus.lebih = nilaiFuzzi;
                }
            }

            // TB Sedang
            if (fuzziStatus.tinggiBadan.sedang == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase1 - Sedang - Sedang");
                console.log(
                    nilai.umur.fase1 +
                        ", " +
                        nilai.beratBadan.sedang +
                        ", " +
                        nilai.tinggiBadan.sedang
                );
                if (
                    nilai.umur.fase1 < nilai.beratBadan.sedang &&
                    nilai.umur.fase1 < nilai.tinggiBadan.sedang
                ) {
                    nilaiFuzzi = nilai.umur.fase1;
                } else if (nilai.beratBadan.sedang < nilai.tinggiBadan.sedang) {
                    nilaiFuzzi = nilai.beratBadan.sedang;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.sedang;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.lebih) {
                    giziStatus.lebih = nilaiFuzzi;
                }
            }

            // TB Tinggi
            if (fuzziStatus.tinggiBadan.tinggi == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase1 - Sedang - Tinggi");
                console.log(
                    nilai.umur.fase1 +
                        ", " +
                        nilai.beratBadan.sedang +
                        ", " +
                        nilai.tinggiBadan.tinggi
                );
                if (
                    nilai.umur.fase1 < nilai.beratBadan.sedang &&
                    nilai.umur.fase1 < nilai.tinggiBadan.tinggi
                ) {
                    nilaiFuzzi = nilai.umur.fase1;
                } else if (nilai.beratBadan.sedang < nilai.tinggiBadan.tinggi) {
                    nilaiFuzzi = nilai.beratBadan.sedang;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.tinggi;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.lebih) {
                    giziStatus.lebih = nilaiFuzzi;
                }
            }
        }

        // BB Berat
        if (fuzziStatus.beratBadan.berat == true) {
            // TB Rendah
            if (fuzziStatus.tinggiBadan.rendah == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase1 - Berat - Rendah");
                console.log(
                    nilai.umur.fase1 +
                        ", " +
                        nilai.beratBadan.berat +
                        ", " +
                        nilai.tinggiBadan.rendah
                );
                if (
                    nilai.umur.fase1 < nilai.beratBadan.berat &&
                    nilai.umur.fase1 < nilai.tinggiBadan.rendah
                ) {
                    nilaiFuzzi = nilai.umur.fase1;
                } else if (nilai.beratBadan.berat < nilai.tinggiBadan.rendah) {
                    nilaiFuzzi = nilai.beratBadan.berat;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.rendah;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.lebih) {
                    giziStatus.lebih = nilaiFuzzi;
                }
            }

            // TB Sedang
            if (fuzziStatus.tinggiBadan.sedang == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase1 - Berat - Sedang");
                console.log(
                    nilai.umur.fase1 +
                        ", " +
                        nilai.beratBadan.berat +
                        ", " +
                        nilai.tinggiBadan.sedang
                );
                if (
                    nilai.umur.fase1 < nilai.beratBadan.berat &&
                    nilai.umur.fase1 < nilai.tinggiBadan.sedang
                ) {
                    nilaiFuzzi = nilai.umur.fase1;
                } else if (nilai.beratBadan.berat < nilai.tinggiBadan.sedang) {
                    nilaiFuzzi = nilai.beratBadan.berat;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.sedang;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.lebih) {
                    giziStatus.lebih = nilaiFuzzi;
                }
            }

            // TB Tinggi
            if (fuzziStatus.tinggiBadan.tinggi == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase1 - Berat - Tinggi");
                console.log(
                    nilai.umur.fase1 +
                        ", " +
                        nilai.beratBadan.berat +
                        ", " +
                        nilai.tinggiBadan.tinggi
                );
                if (
                    nilai.umur.fase1 < nilai.beratBadan.berat &&
                    nilai.umur.fase1 < nilai.tinggiBadan.tinggi
                ) {
                    nilaiFuzzi = nilai.umur.fase1;
                } else if (nilai.beratBadan.berat < nilai.tinggiBadan.tinggi) {
                    nilaiFuzzi = nilai.beratBadan.berat;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.tinggi;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.lebih) {
                    giziStatus.lebih = nilaiFuzzi;
                }
            }
        }
    }

    // Umur Fase 2
    if (fuzziStatus.umur.fase2 == true) {
        // BB Ringan
        if (fuzziStatus.beratBadan.ringan == true) {
            // TB Rendah
            if (fuzziStatus.tinggiBadan.rendah == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase2 - Ringan - Rendah");
                console.log(
                    nilai.umur.fase2 +
                        ", " +
                        nilai.beratBadan.ringan +
                        ", " +
                        nilai.tinggiBadan.rendah
                );
                if (
                    nilai.umur.fase2 < nilai.beratBadan.ringan &&
                    nilai.umur.fase2 < nilai.tinggiBadan.rendah
                ) {
                    nilaiFuzzi = nilai.umur.fase2;
                } else if (nilai.beratBadan.ringan < nilai.tinggiBadan.rendah) {
                    nilaiFuzzi = nilai.beratBadan.ringan;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.rendah;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.sedang) {
                    giziStatus.sedang = nilaiFuzzi;
                }
            }

            // TB Sedang
            if (fuzziStatus.tinggiBadan.sedang == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase2 - Ringan - Sedang");
                console.log(
                    nilai.umur.fase2 +
                        ", " +
                        nilai.beratBadan.ringan +
                        ", " +
                        nilai.tinggiBadan.sedang
                );
                if (
                    nilai.umur.fase2 < nilai.beratBadan.ringan &&
                    nilai.umur.fase2 < nilai.tinggiBadan.sedang
                ) {
                    nilaiFuzzi = nilai.umur.fase2;
                } else if (nilai.beratBadan.ringan < nilai.tinggiBadan.sedang) {
                    nilaiFuzzi = nilai.beratBadan.ringan;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.sedang;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.sedang) {
                    giziStatus.sedang = nilaiFuzzi;
                }
            }

            // TB Tinggi
            if (fuzziStatus.tinggiBadan.tinggi == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase2 - Ringan - Tinggi");
                console.log(
                    nilai.umur.fase2 +
                        ", " +
                        nilai.beratBadan.ringan +
                        ", " +
                        nilai.tinggiBadan.tinggi
                );
                if (
                    nilai.umur.fase2 < nilai.beratBadan.ringan &&
                    nilai.umur.fase2 < nilai.tinggiBadan.tinggi
                ) {
                    nilaiFuzzi = nilai.umur.fase2;
                } else if (nilai.beratBadan.ringan < nilai.tinggiBadan.tinggi) {
                    nilaiFuzzi = nilai.beratBadan.ringan;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.tinggi;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.sedang) {
                    giziStatus.sedang = nilaiFuzzi;
                }
            }
        }

        // BB Sedang
        if (fuzziStatus.beratBadan.sedang == true) {
            // TB Rendah
            if (fuzziStatus.tinggiBadan.rendah == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase2 - Sedang - Rendah");
                console.log(
                    nilai.umur.fase2 +
                        ", " +
                        nilai.beratBadan.sedang +
                        ", " +
                        nilai.tinggiBadan.rendah
                );
                if (
                    nilai.umur.fase2 < nilai.beratBadan.sedang &&
                    nilai.umur.fase2 < nilai.tinggiBadan.rendah
                ) {
                    nilaiFuzzi = nilai.umur.fase2;
                } else if (nilai.beratBadan.sedang < nilai.tinggiBadan.rendah) {
                    nilaiFuzzi = nilai.beratBadan.sedang;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.rendah;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.baik) {
                    giziStatus.baik = nilaiFuzzi;
                }
            }

            // TB Sedang
            if (fuzziStatus.tinggiBadan.sedang == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase2 - Sedang - Sedang");
                console.log(
                    nilai.umur.fase2 +
                        ", " +
                        nilai.beratBadan.sedang +
                        ", " +
                        nilai.tinggiBadan.sedang
                );
                if (
                    nilai.umur.fase2 < nilai.beratBadan.sedang &&
                    nilai.umur.fase2 < nilai.tinggiBadan.sedang
                ) {
                    nilaiFuzzi = nilai.umur.fase2;
                } else if (nilai.beratBadan.sedang < nilai.tinggiBadan.sedang) {
                    nilaiFuzzi = nilai.beratBadan.sedang;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.sedang;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.baik) {
                    giziStatus.baik = nilaiFuzzi;
                }
            }

            // TB Tinggi
            if (fuzziStatus.tinggiBadan.tinggi == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase2 - Sedang - Tinggi");
                console.log(
                    nilai.umur.fase2 +
                        ", " +
                        nilai.beratBadan.sedang +
                        ", " +
                        nilai.tinggiBadan.tinggi
                );
                if (
                    nilai.umur.fase2 < nilai.beratBadan.sedang &&
                    nilai.umur.fase2 < nilai.tinggiBadan.tinggi
                ) {
                    nilaiFuzzi = nilai.umur.fase2;
                } else if (nilai.beratBadan.sedang < nilai.tinggiBadan.tinggi) {
                    nilaiFuzzi = nilai.beratBadan.sedang;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.tinggi;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.baik) {
                    giziStatus.baik = nilaiFuzzi;
                }
            }
        }

        // BB Berat
        if (fuzziStatus.beratBadan.berat == true) {
            // TB Rendah
            if (fuzziStatus.tinggiBadan.rendah == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase2 - Berat - Rendah");
                console.log(
                    nilai.umur.fase2 +
                        ", " +
                        nilai.beratBadan.berat +
                        ", " +
                        nilai.tinggiBadan.rendah
                );
                if (
                    nilai.umur.fase2 < nilai.beratBadan.berat &&
                    nilai.umur.fase2 < nilai.tinggiBadan.rendah
                ) {
                    nilaiFuzzi = nilai.umur.fase2;
                } else if (nilai.beratBadan.berat < nilai.tinggiBadan.rendah) {
                    nilaiFuzzi = nilai.beratBadan.berat;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.rendah;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.lebih) {
                    giziStatus.lebih = nilaiFuzzi;
                }
            }

            // TB Sedang
            if (fuzziStatus.tinggiBadan.sedang == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase2 - Berat - Sedang");
                console.log(
                    nilai.umur.fase2 +
                        ", " +
                        nilai.beratBadan.berat +
                        ", " +
                        nilai.tinggiBadan.sedang
                );
                if (
                    nilai.umur.fase2 < nilai.beratBadan.berat &&
                    nilai.umur.fase2 < nilai.tinggiBadan.sedang
                ) {
                    nilaiFuzzi = nilai.umur.fase2;
                } else if (nilai.beratBadan.berat < nilai.tinggiBadan.sedang) {
                    nilaiFuzzi = nilai.beratBadan.berat;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.sedang;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.lebih) {
                    giziStatus.lebih = nilaiFuzzi;
                }
            }

            // TB Tinggi
            if (fuzziStatus.tinggiBadan.tinggi == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase2 - Berat - Tinggi");
                console.log(
                    nilai.umur.fase2 +
                        ", " +
                        nilai.beratBadan.berat +
                        ", " +
                        nilai.tinggiBadan.tinggi
                );
                if (
                    nilai.umur.fase2 < nilai.beratBadan.berat &&
                    nilai.umur.fase2 < nilai.tinggiBadan.tinggi
                ) {
                    nilaiFuzzi = nilai.umur.fase2;
                } else if (nilai.beratBadan.berat < nilai.tinggiBadan.tinggi) {
                    nilaiFuzzi = nilai.beratBadan.berat;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.tinggi;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.lebih) {
                    giziStatus.lebih = nilaiFuzzi;
                }
            }
        }
    }

    // Umur Fase 3
    if (fuzziStatus.umur.fase3 == true) {
        // BB Ringan
        if (fuzziStatus.beratBadan.ringan == true) {
            // TB Rendah
            if (fuzziStatus.tinggiBadan.rendah == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase3 - Ringan - Rendah");
                console.log(
                    nilai.umur.fase3 +
                        ", " +
                        nilai.beratBadan.ringan +
                        ", " +
                        nilai.tinggiBadan.rendah
                );
                if (
                    nilai.umur.fase3 < nilai.beratBadan.ringan &&
                    nilai.umur.fase3 < nilai.tinggiBadan.rendah
                ) {
                    nilaiFuzzi = nilai.umur.fase3;
                } else if (nilai.beratBadan.ringan < nilai.tinggiBadan.rendah) {
                    nilaiFuzzi = nilai.beratBadan.ringan;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.rendah;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.kurang) {
                    giziStatus.kurang = nilaiFuzzi;
                }
            }

            // TB Sedang
            if (fuzziStatus.tinggiBadan.sedang == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase3 - Ringan - Sedang");
                console.log(
                    nilai.umur.fase3 +
                        ", " +
                        nilai.beratBadan.ringan +
                        ", " +
                        nilai.tinggiBadan.sedang
                );
                if (
                    nilai.umur.fase3 < nilai.beratBadan.ringan &&
                    nilai.umur.fase3 < nilai.tinggiBadan.sedang
                ) {
                    nilaiFuzzi = nilai.umur.fase3;
                } else if (nilai.beratBadan.ringan < nilai.tinggiBadan.sedang) {
                    nilaiFuzzi = nilai.beratBadan.ringan;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.sedang;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.kurang) {
                    giziStatus.kurang = nilaiFuzzi;
                }
            }

            // TB Tinggi
            if (fuzziStatus.tinggiBadan.tinggi == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase3 - Ringan - Tinggi");
                console.log(
                    nilai.umur.fase3 +
                        ", " +
                        nilai.beratBadan.ringan +
                        ", " +
                        nilai.tinggiBadan.tinggi
                );
                if (
                    nilai.umur.fase3 < nilai.beratBadan.ringan &&
                    nilai.umur.fase3 < nilai.tinggiBadan.tinggi
                ) {
                    nilaiFuzzi = nilai.umur.fase3;
                } else if (nilai.beratBadan.ringan < nilai.tinggiBadan.tinggi) {
                    nilaiFuzzi = nilai.beratBadan.ringan;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.tinggi;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.kurang) {
                    giziStatus.kurang = nilaiFuzzi;
                }
            }
        }

        // BB Sedang
        if (fuzziStatus.beratBadan.sedang == true) {
            // TB Rendah
            if (fuzziStatus.tinggiBadan.rendah == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase3 - Sedang - Rendah");
                console.log(
                    nilai.umur.fase3 +
                        ", " +
                        nilai.beratBadan.sedang +
                        ", " +
                        nilai.tinggiBadan.rendah
                );
                if (
                    nilai.umur.fase3 < nilai.beratBadan.sedang &&
                    nilai.umur.fase3 < nilai.tinggiBadan.rendah
                ) {
                    nilaiFuzzi = nilai.umur.fase3;
                } else if (nilai.beratBadan.sedang < nilai.tinggiBadan.rendah) {
                    nilaiFuzzi = nilai.beratBadan.sedang;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.rendah;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.baik) {
                    giziStatus.baik = nilaiFuzzi;
                }
            }

            // TB Sedang
            if (fuzziStatus.tinggiBadan.sedang == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase3 - Sedang - Sedang");
                console.log(
                    nilai.umur.fase3 +
                        ", " +
                        nilai.beratBadan.sedang +
                        ", " +
                        nilai.tinggiBadan.sedang
                );
                if (
                    nilai.umur.fase3 < nilai.beratBadan.sedang &&
                    nilai.umur.fase3 < nilai.tinggiBadan.sedang
                ) {
                    nilaiFuzzi = nilai.umur.fase3;
                } else if (nilai.beratBadan.sedang < nilai.tinggiBadan.sedang) {
                    nilaiFuzzi = nilai.beratBadan.sedang;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.sedang;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.baik) {
                    giziStatus.baik = nilaiFuzzi;
                }
            }

            // TB Tinggi
            if (fuzziStatus.tinggiBadan.tinggi == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase3 - Sedang - Tinggi");
                console.log(
                    nilai.umur.fase3 +
                        ", " +
                        nilai.beratBadan.sedang +
                        ", " +
                        nilai.tinggiBadan.tinggi
                );
                if (
                    nilai.umur.fase3 < nilai.beratBadan.sedang &&
                    nilai.umur.fase3 < nilai.tinggiBadan.tinggi
                ) {
                    nilaiFuzzi = nilai.umur.fase3;
                } else if (nilai.beratBadan.sedang < nilai.tinggiBadan.tinggi) {
                    nilaiFuzzi = nilai.beratBadan.sedang;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.tinggi;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.baik) {
                    giziStatus.baik = nilaiFuzzi;
                }
            }
        }

        // BB Berat
        if (fuzziStatus.beratBadan.berat == true) {
            // TB Rendah
            if (fuzziStatus.tinggiBadan.rendah == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase3 - Berat - Rendah");
                console.log(
                    nilai.umur.fase3 +
                        ", " +
                        nilai.beratBadan.berat +
                        ", " +
                        nilai.tinggiBadan.rendah
                );
                if (
                    nilai.umur.fase3 < nilai.beratBadan.berat &&
                    nilai.umur.fase3 < nilai.tinggiBadan.rendah
                ) {
                    nilaiFuzzi = nilai.umur.fase3;
                } else if (nilai.beratBadan.berat < nilai.tinggiBadan.rendah) {
                    nilaiFuzzi = nilai.beratBadan.berat;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.rendah;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.lebih) {
                    giziStatus.lebih = nilaiFuzzi;
                }
            }

            // TB Sedang
            if (fuzziStatus.tinggiBadan.sedang == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase3 - Berat - Sedang");
                console.log(
                    nilai.umur.fase3 +
                        ", " +
                        nilai.beratBadan.berat +
                        ", " +
                        nilai.tinggiBadan.sedang
                );
                if (
                    nilai.umur.fase3 < nilai.beratBadan.berat &&
                    nilai.umur.fase3 < nilai.tinggiBadan.sedang
                ) {
                    nilaiFuzzi = nilai.umur.fase3;
                } else if (nilai.beratBadan.berat < nilai.tinggiBadan.sedang) {
                    nilaiFuzzi = nilai.beratBadan.berat;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.sedang;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.lebih) {
                    giziStatus.lebih = nilaiFuzzi;
                }
            }

            // TB Tinggi
            if (fuzziStatus.tinggiBadan.tinggi == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase3 - Berat - Tinggi");
                console.log(
                    nilai.umur.fase3 +
                        ", " +
                        nilai.beratBadan.berat +
                        ", " +
                        nilai.tinggiBadan.tinggi
                );
                if (
                    nilai.umur.fase3 < nilai.beratBadan.berat &&
                    nilai.umur.fase3 < nilai.tinggiBadan.tinggi
                ) {
                    nilaiFuzzi = nilai.umur.fase3;
                } else if (nilai.beratBadan.berat < nilai.tinggiBadan.tinggi) {
                    nilaiFuzzi = nilai.beratBadan.berat;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.tinggi;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.lebih) {
                    giziStatus.lebih = nilaiFuzzi;
                }
            }
        }
    }

    // Umur Fase 4
    if (fuzziStatus.umur.fase4 == true) {
        // BB Ringan
        if (fuzziStatus.beratBadan.ringan == true) {
            // TB Rendah
            if (fuzziStatus.tinggiBadan.rendah == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase4 - Ringan - Rendah");
                console.log(
                    nilai.umur.fase4 +
                        ", " +
                        nilai.beratBadan.ringan +
                        ", " +
                        nilai.tinggiBadan.rendah
                );
                if (
                    nilai.umur.fase4 < nilai.beratBadan.ringan &&
                    nilai.umur.fase4 < nilai.tinggiBadan.rendah
                ) {
                    nilaiFuzzi = nilai.umur.fase4;
                } else if (nilai.beratBadan.ringan < nilai.tinggiBadan.rendah) {
                    nilaiFuzzi = nilai.beratBadan.ringan;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.rendah;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.kurang) {
                    giziStatus.kurang = nilaiFuzzi;
                }
            }

            // TB Sedang
            if (fuzziStatus.tinggiBadan.sedang == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase4 - Ringan - Sedang");
                console.log(
                    nilai.umur.fase4 +
                        ", " +
                        nilai.beratBadan.ringan +
                        ", " +
                        nilai.tinggiBadan.sedang
                );
                if (
                    nilai.umur.fase4 < nilai.beratBadan.ringan &&
                    nilai.umur.fase4 < nilai.tinggiBadan.sedang
                ) {
                    nilaiFuzzi = nilai.umur.fase4;
                } else if (nilai.beratBadan.ringan < nilai.tinggiBadan.sedang) {
                    nilaiFuzzi = nilai.beratBadan.ringan;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.sedang;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.kurang) {
                    giziStatus.kurang = nilaiFuzzi;
                }
            }

            // TB Tinggi
            if (fuzziStatus.tinggiBadan.tinggi == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase4 - Ringan - Tinggi");
                console.log(
                    nilai.umur.fase4 +
                        ", " +
                        nilai.beratBadan.ringan +
                        ", " +
                        nilai.tinggiBadan.tinggi
                );
                if (
                    nilai.umur.fase4 < nilai.beratBadan.ringan &&
                    nilai.umur.fase4 < nilai.tinggiBadan.tinggi
                ) {
                    nilaiFuzzi = nilai.umur.fase4;
                } else if (nilai.beratBadan.ringan < nilai.tinggiBadan.tinggi) {
                    nilaiFuzzi = nilai.beratBadan.ringan;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.tinggi;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.kurang) {
                    giziStatus.kurang = nilaiFuzzi;
                }
            }
        }

        // BB Sedang
        if (fuzziStatus.beratBadan.sedang == true) {
            // TB Rendah
            if (fuzziStatus.tinggiBadan.rendah == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase4 - Sedang - Rendah");
                console.log(
                    nilai.umur.fase4 +
                        ", " +
                        nilai.beratBadan.sedang +
                        ", " +
                        nilai.tinggiBadan.rendah
                );
                if (
                    nilai.umur.fase4 < nilai.beratBadan.sedang &&
                    nilai.umur.fase4 < nilai.tinggiBadan.rendah
                ) {
                    nilaiFuzzi = nilai.umur.fase4;
                } else if (nilai.beratBadan.sedang < nilai.tinggiBadan.rendah) {
                    nilaiFuzzi = nilai.beratBadan.sedang;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.rendah;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.sedang) {
                    giziStatus.sedang = nilaiFuzzi;
                }
            }

            // TB Sedang
            if (fuzziStatus.tinggiBadan.sedang == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase4 - Sedang - Sedang");
                console.log(
                    nilai.umur.fase4 +
                        ", " +
                        nilai.beratBadan.sedang +
                        ", " +
                        nilai.tinggiBadan.sedang
                );
                if (
                    nilai.umur.fase4 < nilai.beratBadan.sedang &&
                    nilai.umur.fase4 < nilai.tinggiBadan.sedang
                ) {
                    nilaiFuzzi = nilai.umur.fase4;
                } else if (nilai.beratBadan.sedang < nilai.tinggiBadan.sedang) {
                    nilaiFuzzi = nilai.beratBadan.sedang;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.sedang;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.sedang) {
                    giziStatus.sedang = nilaiFuzzi;
                }
            }

            // TB Tinggi
            if (fuzziStatus.tinggiBadan.tinggi == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase4 - Sedang - Tinggi");
                console.log(
                    nilai.umur.fase4 +
                        ", " +
                        nilai.beratBadan.sedang +
                        ", " +
                        nilai.tinggiBadan.tinggi
                );
                if (
                    nilai.umur.fase4 < nilai.beratBadan.sedang &&
                    nilai.umur.fase4 < nilai.tinggiBadan.tinggi
                ) {
                    nilaiFuzzi = nilai.umur.fase4;
                } else if (nilai.beratBadan.sedang < nilai.tinggiBadan.tinggi) {
                    nilaiFuzzi = nilai.beratBadan.sedang;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.tinggi;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.baik) {
                    giziStatus.baik = nilaiFuzzi;
                }
            }
        }

        // BB Berat
        if (fuzziStatus.beratBadan.berat == true) {
            // TB Rendah
            if (fuzziStatus.tinggiBadan.rendah == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase4 - Berat - Rendah");
                console.log(
                    nilai.umur.fase4 +
                        ", " +
                        nilai.beratBadan.berat +
                        ", " +
                        nilai.tinggiBadan.rendah
                );
                if (
                    nilai.umur.fase4 < nilai.beratBadan.berat &&
                    nilai.umur.fase4 < nilai.tinggiBadan.rendah
                ) {
                    nilaiFuzzi = nilai.umur.fase4;
                } else if (nilai.beratBadan.berat < nilai.tinggiBadan.rendah) {
                    nilaiFuzzi = nilai.beratBadan.berat;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.rendah;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.lebih) {
                    giziStatus.lebih = nilaiFuzzi;
                }
            }

            // TB Sedang
            if (fuzziStatus.tinggiBadan.sedang == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase4 - Berat - Sedang");
                console.log(
                    nilai.umur.fase4 +
                        ", " +
                        nilai.beratBadan.berat +
                        ", " +
                        nilai.tinggiBadan.sedang
                );
                if (
                    nilai.umur.fase4 < nilai.beratBadan.berat &&
                    nilai.umur.fase4 < nilai.tinggiBadan.sedang
                ) {
                    nilaiFuzzi = nilai.umur.fase4;
                } else if (nilai.beratBadan.berat < nilai.tinggiBadan.sedang) {
                    nilaiFuzzi = nilai.beratBadan.berat;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.sedang;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.lebih) {
                    giziStatus.lebih = nilaiFuzzi;
                }
            }

            // TB Tinggi
            if (fuzziStatus.tinggiBadan.tinggi == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase4 - Berat - Tinggi");
                console.log(
                    nilai.umur.fase4 +
                        ", " +
                        nilai.beratBadan.berat +
                        ", " +
                        nilai.tinggiBadan.tinggi
                );
                if (
                    nilai.umur.fase4 < nilai.beratBadan.berat &&
                    nilai.umur.fase4 < nilai.tinggiBadan.tinggi
                ) {
                    nilaiFuzzi = nilai.umur.fase4;
                } else if (nilai.beratBadan.berat < nilai.tinggiBadan.tinggi) {
                    nilaiFuzzi = nilai.beratBadan.berat;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.tinggi;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.baik) {
                    giziStatus.baik = nilaiFuzzi;
                }
            }
        }
    }

    // Umur Fase 5
    if (fuzziStatus.umur.fase5 == true) {
        // BB Ringan
        if (fuzziStatus.beratBadan.ringan == true) {
            // TB Rendah
            if (fuzziStatus.tinggiBadan.rendah == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase5 - Ringan - Rendah");
                console.log(
                    nilai.umur.fase5 +
                        ", " +
                        nilai.beratBadan.ringan +
                        ", " +
                        nilai.tinggiBadan.rendah
                );
                if (
                    nilai.umur.fase5 < nilai.beratBadan.ringan &&
                    nilai.umur.fase5 < nilai.tinggiBadan.rendah
                ) {
                    nilaiFuzzi = nilai.umur.fase5;
                } else if (nilai.beratBadan.ringan < nilai.tinggiBadan.rendah) {
                    nilaiFuzzi = nilai.beratBadan.ringan;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.rendah;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.buruk) {
                    giziStatus.buruk = nilaiFuzzi;
                }
            }

            // TB Sedang
            if (fuzziStatus.tinggiBadan.sedang == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase5 - Ringan - Sedang");
                console.log(
                    nilai.umur.fase5 +
                        ", " +
                        nilai.beratBadan.ringan +
                        ", " +
                        nilai.tinggiBadan.sedang
                );
                if (
                    nilai.umur.fase5 < nilai.beratBadan.ringan &&
                    nilai.umur.fase5 < nilai.tinggiBadan.sedang
                ) {
                    nilaiFuzzi = nilai.umur.fase5;
                } else if (nilai.beratBadan.ringan < nilai.tinggiBadan.sedang) {
                    nilaiFuzzi = nilai.beratBadan.ringan;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.sedang;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.buruk) {
                    giziStatus.buruk = nilaiFuzzi;
                }
            }

            // TB Tinggi
            if (fuzziStatus.tinggiBadan.tinggi == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase5 - Ringan - Tinggi");
                console.log(
                    nilai.umur.fase5 +
                        ", " +
                        nilai.beratBadan.ringan +
                        ", " +
                        nilai.tinggiBadan.tinggi
                );
                if (
                    nilai.umur.fase5 < nilai.beratBadan.ringan &&
                    nilai.umur.fase5 < nilai.tinggiBadan.tinggi
                ) {
                    nilaiFuzzi = nilai.umur.fase5;
                } else if (nilai.beratBadan.ringan < nilai.tinggiBadan.tinggi) {
                    nilaiFuzzi = nilai.beratBadan.ringan;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.tinggi;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.buruk) {
                    giziStatus.buruk = nilaiFuzzi;
                }
            }
        }

        // BB Sedang
        if (fuzziStatus.beratBadan.sedang == true) {
            // TB Rendah
            if (fuzziStatus.tinggiBadan.rendah == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase5 - Sedang - Rendah");
                console.log(
                    nilai.umur.fase5 +
                        ", " +
                        nilai.beratBadan.sedang +
                        ", " +
                        nilai.tinggiBadan.rendah
                );
                if (
                    nilai.umur.fase5 < nilai.beratBadan.sedang &&
                    nilai.umur.fase5 < nilai.tinggiBadan.rendah
                ) {
                    nilaiFuzzi = nilai.umur.fase5;
                } else if (nilai.beratBadan.sedang < nilai.tinggiBadan.rendah) {
                    nilaiFuzzi = nilai.beratBadan.sedang;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.rendah;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.kurang) {
                    giziStatus.kurang = nilaiFuzzi;
                }
            }

            // TB Sedang
            if (fuzziStatus.tinggiBadan.sedang == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase5 - Sedang - Sedang");
                console.log(
                    nilai.umur.fase5 +
                        ", " +
                        nilai.beratBadan.sedang +
                        ", " +
                        nilai.tinggiBadan.sedang
                );
                if (
                    nilai.umur.fase5 < nilai.beratBadan.sedang &&
                    nilai.umur.fase5 < nilai.tinggiBadan.sedang
                ) {
                    nilaiFuzzi = nilai.umur.fase5;
                } else if (nilai.beratBadan.sedang < nilai.tinggiBadan.sedang) {
                    nilaiFuzzi = nilai.beratBadan.sedang;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.sedang;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.kurang) {
                    giziStatus.kurang = nilaiFuzzi;
                }
            }

            // TB Tinggi
            if (fuzziStatus.tinggiBadan.tinggi == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase5 - Sedang - Tinggi");
                console.log(
                    nilai.umur.fase5 +
                        ", " +
                        nilai.beratBadan.sedang +
                        ", " +
                        nilai.tinggiBadan.tinggi
                );
                if (
                    nilai.umur.fase5 < nilai.beratBadan.sedang &&
                    nilai.umur.fase5 < nilai.tinggiBadan.tinggi
                ) {
                    nilaiFuzzi = nilai.umur.fase5;
                } else if (nilai.beratBadan.sedang < nilai.tinggiBadan.tinggi) {
                    nilaiFuzzi = nilai.beratBadan.sedang;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.tinggi;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.kurang) {
                    giziStatus.kurang = nilaiFuzzi;
                }
            }
        }

        // BB Berat
        if (fuzziStatus.beratBadan.berat == true) {
            // TB Rendah
            if (fuzziStatus.tinggiBadan.rendah == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase5 - Berat - Rendah");
                console.log(
                    nilai.umur.fase5 +
                        ", " +
                        nilai.beratBadan.berat +
                        ", " +
                        nilai.tinggiBadan.rendah
                );
                if (
                    nilai.umur.fase5 < nilai.beratBadan.berat &&
                    nilai.umur.fase5 < nilai.tinggiBadan.rendah
                ) {
                    nilaiFuzzi = nilai.umur.fase5;
                } else if (nilai.beratBadan.berat < nilai.tinggiBadan.rendah) {
                    nilaiFuzzi = nilai.beratBadan.berat;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.rendah;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.lebih) {
                    giziStatus.lebih = nilaiFuzzi;
                }
            }

            // TB Sedang
            if (fuzziStatus.tinggiBadan.sedang == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase5 - Berat - Sedang");
                console.log(
                    nilai.umur.fase5 +
                        ", " +
                        nilai.beratBadan.berat +
                        ", " +
                        nilai.tinggiBadan.sedang
                );
                if (
                    nilai.umur.fase5 < nilai.beratBadan.berat &&
                    nilai.umur.fase5 < nilai.tinggiBadan.sedang
                ) {
                    nilaiFuzzi = nilai.umur.fase5;
                } else if (nilai.beratBadan.berat < nilai.tinggiBadan.sedang) {
                    nilaiFuzzi = nilai.beratBadan.berat;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.sedang;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.lebih) {
                    giziStatus.lebih = nilaiFuzzi;
                }
            }

            // TB Tinggi
            if (fuzziStatus.tinggiBadan.tinggi == true) {
                nilaiFuzzi = 0;
                giziFuzzi = 0;
                console.log("Fase5 - Berat - Tinggi");
                console.log(
                    nilai.umur.fase5 +
                        ", " +
                        nilai.beratBadan.berat +
                        ", " +
                        nilai.tinggiBadan.tinggi
                );
                if (
                    nilai.umur.fase5 < nilai.beratBadan.berat &&
                    nilai.umur.fase5 < nilai.tinggiBadan.tinggi
                ) {
                    nilaiFuzzi = nilai.umur.fase5;
                } else if (nilai.beratBadan.berat < nilai.tinggiBadan.tinggi) {
                    nilaiFuzzi = nilai.beratBadan.berat;
                } else {
                    nilaiFuzzi = nilai.tinggiBadan.tinggi;
                }

                giziFuzzi = nilaiFuzzi;

                if (giziFuzzi > giziStatus.baik) {
                    giziStatus.baik = nilaiFuzzi;
                }
            }
        }
    }
}

function defuzzifikasi() {
    console.log(giziStatus);
    let hasilGizi =
        (giziStatus.buruk * 43 +
            giziStatus.kurang * 49 +
            giziStatus.sedang * 53 +
            giziStatus.baik * 60 +
            giziStatus.lebih * 70) /
        (giziStatus.buruk +
            giziStatus.kurang +
            giziStatus.sedang +
            giziStatus.baik +
            giziStatus.lebih);

    return hasilGizi;
}

function hasilGizi(nilaiGizi) {
    let data;
    if (nilaiGizi >= 43 && nilaiGizi <= 49) {
        console.log("Gizi Buruk " + nilaiGizi.toFixed(2));
        data = {
            nilai: nilaiGizi.toFixed(2),
            status: "Gizi Buruk",
        };
        return data;
    } else if (nilaiGizi <= 53) {
        console.log("Gizi Kurang " + nilaiGizi.toFixed(2));
        data = {
            nilai: nilaiGizi.toFixed(2),
            status: "Gizi Kurang",
        };
        return data;
    } else if (nilaiGizi <= 60) {
        console.log("Gizi Sedang " + nilaiGizi.toFixed(2));
        data = {
            nilai: nilaiGizi.toFixed(2),
            status: "Gizi Sedang",
        };
        return data;
    } else if (nilaiGizi <= 70) {
        console.log("Gizi Baik " + nilaiGizi.toFixed(2));
        data = {
            nilai: nilaiGizi.toFixed(2),
            status: "Gizi Baik",
        };
        return data;
    } else {
        console.log("Gizi Lebih " + nilaiGizi.toFixed(2));
        data = {
            nilai: nilaiGizi.toFixed(2),
            status: "Gizi Lebih",
        };
        return data;
    }
}
