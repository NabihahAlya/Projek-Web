/*
=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal. Contact us if you want to remove it.

*/

"use strict";
const d = document;
d.addEventListener("DOMContentLoaded", function(event) {

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-primary me-3',
            cancelButton: 'btn btn-gray'
        },
        buttonsStyling: false
    });

    const themeSettingsEl = d.getElementById('theme-settings');
    const themeSettingsExpandEl = d.getElementById('theme-settings-expand');

    if (themeSettingsEl && themeSettingsExpandEl) {
        const themeSettingsCollapse = new bootstrap.Collapse(themeSettingsEl, {
            show: true,
            toggle: false
        });

        if (window.localStorage.getItem('settings_expanded') === 'true') {
            themeSettingsCollapse.show();
            themeSettingsExpandEl.classList.remove('show');
        } else {
            themeSettingsCollapse.hide();
            themeSettingsExpandEl.classList.add('show');
        }

        themeSettingsEl.addEventListener('hidden.bs.collapse', function () {
            themeSettingsExpandEl.classList.add('show');
            window.localStorage.setItem('settings_expanded', false);
        });

        themeSettingsExpandEl.addEventListener('click', function () {
            themeSettingsExpandEl.classList.remove('show');
            window.localStorage.setItem('settings_expanded', true);
            setTimeout(function() {
                themeSettingsCollapse.show();
            }, 300);
        });
    }

    const breakpoints = {
        sm: 540,
        md: 720,
        lg: 960,
        xl: 1140
    };

    const sidebar = d.getElementById('sidebarMenu');
    if (sidebar && d.body.clientWidth < breakpoints.lg) {
        sidebar.addEventListener('shown.bs.collapse', () => {
            d.body.style.position = 'fixed';
        });
        sidebar.addEventListener('hidden.bs.collapse', () => {
            d.body.style.position = 'relative';
        });
    }

    const iconNotifications = d.querySelector('.notification-bell');
    if (iconNotifications) {
        iconNotifications.addEventListener('shown.bs.dropdown', function () {
            iconNotifications.classList.remove('unread');
        });
    }

    [].slice.call(d.querySelectorAll('[data-background]')).forEach(function(el) {
        el.style.backgroundImage = 'url(' + el.getAttribute('data-background') + ')';
    });

    [].slice.call(d.querySelectorAll('[data-background-lg]')).forEach(function(el) {
        if (d.body.clientWidth > breakpoints.lg) {
            el.style.backgroundImage = 'url(' + el.getAttribute('data-background-lg') + ')';
        }
    });

    [].slice.call(d.querySelectorAll('[data-background-color]')).forEach(function(el) {
        el.style.backgroundColor = el.getAttribute('data-background-color');
    });

    [].slice.call(d.querySelectorAll('[data-color]')).forEach(function(el) {
        el.style.color = el.getAttribute('data-color');
    });

    // Tooltips
    const tooltipTriggerList = [].slice.call(d.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Popovers
    const popoverTriggerList = [].slice.call(d.querySelectorAll('[data-bs-toggle="popover"]'));
    popoverTriggerList.forEach(function (popoverTriggerEl) {
        new bootstrap.Popover(popoverTriggerEl);
    });

    // Datepicker
    const datepickers = [].slice.call(d.querySelectorAll('[data-datepicker]'));
    datepickers.forEach(function (el) {
        new Datepicker(el, {
            buttonClass: 'btn'
        });
    });

    // Slider
    if (d.querySelector('.input-slider-container')) {
        [].slice.call(d.querySelectorAll('.input-slider-container')).forEach(function(el) {
            const slider = el.querySelector('.input-slider');
            const sliderId = slider.getAttribute('id');
            const minValue = slider.getAttribute('data-range-value-min');
            const maxValue = slider.getAttribute('data-range-value-max');

            const sliderValue = el.querySelector('.range-slider-value');
            const sliderValueId = sliderValue.getAttribute('id');
            const startValue = sliderValue.getAttribute('data-range-value-low');

            const c = d.getElementById(sliderId),
                id = d.getElementById(sliderValueId);

            noUiSlider.create(c, {
                start: [parseInt(startValue)],
                connect: [true, false],
                range: {
                    min: parseInt(minValue),
                    max: parseInt(maxValue)
                }
            });
        });
    }

    if (d.getElementById('input-slider-range')) {
        const c = d.getElementById("input-slider-range"),
            low = d.getElementById("input-slider-range-value-low"),
            high = d.getElementById("input-slider-range-value-high"),
            f = [low, high];

        noUiSlider.create(c, {
            start: [parseInt(low.getAttribute('data-range-value-low')), parseInt(high.getAttribute('data-range-value-high'))],
            connect: true,
            tooltips: true,
            range: {
                min: parseInt(c.getAttribute('data-range-value-min')),
                max: parseInt(c.getAttribute('data-range-value-max'))
            }
        });

        c.noUiSlider.on("update", function (values, handle) {
            f[handle].textContent = values[handle];
        });
    }

    // Chartist - Sales Value Chart
    if (d.querySelector('.ct-chart-sales-value')) {
        new Chartist.Line('.ct-chart-sales-value', {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            series: [[0, 10, 30, 40, 80, 60, 100]]
        }, {
            low: 0,
            showArea: true,
            fullWidth: true,
            plugins: [Chartist.plugins.tooltip()],
            axisX: {
                position: 'end',
                showGrid: true
            },
            axisY: {
                showGrid: false,
                showLabel: false,
                labelInterpolationFnc: function(value) {
                    return '$' + value + 'k';
                }
            }
        });
    }

    // Chartist - Ranking Chart
    if (d.querySelector('.ct-chart-ranking')) {
        const chart = new Chartist.Bar('.ct-chart-ranking', {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            series: [
                [1, 5, 2, 5, 4, 3],
                [2, 3, 4, 8, 1, 2]
            ]
        }, {
            low: 0,
            showArea: true,
            plugins: [Chartist.plugins.tooltip()],
            axisX: {
                position: 'end'
            },
            axisY: {
                showGrid: false,
                showLabel: false,
                offset: 0
            }
        });

        chart.on('draw', function(data) {
            if (data.type === 'line' || data.type === 'area') {
                data.element.animate({
                    d: {
                        begin: 2000 * data.index,
                        dur: 2000,
                        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                        to: data.path.clone().stringify(),
                        easing: Chartist.Svg.Easing.easeOutQuint
                    }
                });
            }
        });
    }

    // Chartist - Traffic Share
    if (d.querySelector('.ct-chart-traffic-share')) {
        const data = { series: [70, 20, 10] };
        const sum = (a, b) => a + b;

        new Chartist.Pie('.ct-chart-traffic-share', data, {
            labelInterpolationFnc: function(value) {
                return Math.round(value / data.series.reduce(sum) * 100) + '%';
            },
            low: 0,
            high: 8,
            donut: true,
            donutWidth: 20,
            donutSolid: true,
            fullWidth: false,
            showLabel: false,
            plugins: [Chartist.plugins.tooltip()]
        });
    }

    // Load More Button
    const loadBtn = d.getElementById('loadOnClick');
    if (loadBtn) {
        loadBtn.addEventListener('click', function() {
            const loadContent = d.getElementById('extraContent');
            const allLoaded = d.getElementById('allLoadedText');

            this.classList.add('btn-loading');
            this.setAttribute('disabled', 'true');

            setTimeout(function() {
                loadContent.style.display = 'block';
                loadBtn.style.display = 'none';
                allLoaded.style.display = 'block';
            }, 1500);
        });
    }

    new SmoothScroll('a[href*="#"]', {
        speed: 500,
        speedAsDuration: true
    });

    if (d.querySelector('.current-year')) {
        d.querySelector('.current-year').textContent = new Date().getFullYear();
    }

    // Glide JS
    ['.glide', '.glide-testimonials', '.glide-clients', '.glide-news-widget', '.glide-autoplay'].forEach(selector => {
        if (d.querySelector(selector)) {
            new Glide(selector, {
                type: 'carousel',
                startAt: 0,
                perView: selector === '.glide-clients' ? 5 : (selector === '.glide' || selector === '.glide-autoplay' ? 3 : 1),
                autoplay: 2000
            }).mount();
        }
    });

    // Pricing Countup
    if (d.getElementById('billingSwitch')) {
        const countUpStandard = new countUp.CountUp('priceStandard', 99, { startVal: 199 });
        const countUpPremium = new countUp.CountUp('pricePremium', 199, { startVal: 299 });
        const billingSwitchEl = d.getElementById('billingSwitch');

        billingSwitchEl.addEventListener('change', function() {
            if (billingSwitchEl.checked) {
                countUpStandard.start();
                countUpPremium.start();
            } else {
                countUpStandard.reset();
                countUpPremium.reset();
            }
        });
    }

});
