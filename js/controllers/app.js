var app = angular.module("myApp", ["ngRoute"]);

app.config(function ($routeProvider) {
  $routeProvider
    .when("/", {
      templateUrl: "home.html",
      //controller: "jadwalController",
    })
    .when("/jadwal", {
      templateUrl: "showJadwal.html",
      controller: "jadwalController",
    })
    .when("/jadwalujian", {
      templateUrl: "showJadwalU.html",
      controller: "jadwalUjianController",
    })
    .when("/todo", {
      templateUrl: "showTodo.html",
      controller: "todoController",
    })
    .otherwise({
      redirectTo: "/",
    });
});

// Controller untuk jadwal
app.controller("jadwalController", function ($scope, $http) {
  getInfo();
  function getInfo() {
    $http.post("db/read/jadwal.php").then(function (response) {
      $scope.datas = response.data.datanya;
    });
  }

  $scope.addData = function (mapel, hari, wamul, wasel) {
    alert("Duplikasi mapel tidak akan dimasukan database");
    if (wamul > wasel) {
      alert("Waktu Mulai harus lebih kecil dari Waktu Selesai");
    } else {
      $http
        .post("db/input/inputjadwal.php", {
          mapel: mapel,
          hari: hari,
          wamul: wamul,
          wasel: wasel,
        })
        .success(function () {
          alert("Input Berhasil");
          window.location.reload();
        })
        .error(function (error) {
          alert(error);
          window.location.reload();
        });
    }
  };

  $scope.deleteData = function (mapel) {
    if (confirm("Apakah Anda yakin Ingin hapus?")) {
      $http
        .post("db/delete/deleteDetails.php", {
          mapel: mapel,
        })
        .then(function () {
          alert("Hapus Berhasil");
          window.location.reload();
        });
    }
  };
});

app.controller("jadwalUjianController", function ($scope, $http) {
  $http.get("db/read/jadwalujian.php").then(function (response) {
    $scope.datass = response.data.datan;
  });
  $http.get("db/read/jadwal.php").then(function (response) {
    $scope.datas = response.data.datanya;
  });

  $scope.addData = function (mapelUjian, hariUjian, wamulUjian, waselUjian) {
    alert("Duplikasi mapel tidak akan dimasukan database");
    if (wamulUjian > waselUjian) {
      alert("Waktu Mulai harus lebih kecil dari Waktu Selesai");
    } else {
      $http
        .post("db/input/inputjadwalujian.php", {
          mapelUjian: mapelUjian,
          hariUjian: hariUjian,
          wamulUjian: wamulUjian,
          waselUjian: waselUjian,
        })
        .then(function () {
          alert("Input Berhasil");
          window.location.reload();
        });
    }
  };
  $scope.deleteDataUjian = function (mapel) {
    if (confirm("Apakah Anda yakin Ingin hapus?")) {
      $http
        .post("db/delete/deleteUjianDetails.php", {
          mapel: mapel,
        })
        .then(function () {
          window.location.reload();
        });
    }
  };
});

app.controller("todoController", function ($scope, $http) {

  $http.get("db/read/todo.php").then(function (response) {
    $scope.checks = response.data.datanya;
  });

  $scope.addData = function (itemInput) {
    $http
      .post("db/input/inputTodo.php", {
        item: itemInput,
      })
      .then(function () {
        alert("Input Berhasil");
        window.location.reload();
      });
  };

  $scope.deleteDataTodo = function (item) {
    if (confirm("Apakah Anda yakin Ingin hapus?")) {
      $http
        .post("db/delete/deleteTodo.php", {
          item: item,
        })
        .then(function () {
          window.location.reload();
        });
    }
  };
});
