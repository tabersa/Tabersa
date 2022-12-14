"use strict";
var KTSigninGeneral = (function () {
    var e, t, i;
    return {
        init: function () {
            (e = document.querySelector("#kt_sign_in_form")),
                (t = document.querySelector("#kt_sign_in_submit")),
                (i = FormValidation.formValidation(e, {
                    fields: {
                        tenant: {
                            validators: {
                                notEmpty: {
                                    message: "Kode Bank Diperlukan",
                                },
                            },
                        },
                        name: {
                            validators: {
                                notEmpty: {
                                    message: "Nama Diperlukan",
                                },
                            },
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: "Password Diperlukan",
                                },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: "",
                        }),
                    },
                })),
                t.addEventListener("click", function (n) {
                    n.preventDefault(),
                        i.validate().then(function (i) {
                            "Valid" == i
                                ? (t.setAttribute("data-kt-indicator", "on"),
                                  (t.disabled = !0),
                                  setTimeout(function () {
                                      t.removeAttribute("data-kt-indicator"),
                                          (t.disabled = !1),
                                          Swal.fire({
                                              text: "Login Diterima",
                                              icon: "success",
                                              buttonsStyling: !1,
                                              confirmButtonText: "Ok",
                                              customClass: {
                                                  confirmButton:
                                                      "btn btn-success",
                                              },
                                          }).then(function (t) {
                                              if (t.isConfirmed) {
                                                  (e.querySelector(
                                                      '[name="tenant"]'
                                                  ).value = ""),
                                                  (e.querySelector(
                                                    '[name="name"]'
                                                ).value = ""),
                                                      (e.querySelector(
                                                          '[name="password"]'
                                                      ).value = "");
                                                  var i = e.getAttribute(
                                                      "data-kt-redirect-url"
                                                  );
                                                  i && (location.href = i);
                                              }
                                          });
                                  }, 2e3))
                                : Swal.fire({
                                      text: "Sorry, looks like there are some errors detected, please try again.",
                                      icon: "error",
                                      buttonsStyling: !1,
                                      confirmButtonText: "Cek Lagi",
                                      customClass: {
                                          confirmButton: "btn btn-danger",
                                      },
                                  });
                        });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
