	var Core = {
			jphNotificacionCantidad : 0,
			myVar: null,

			limpiarCampos: function () {
				$('formulario').getElements('.valor').each(function (input) {
					if (input.type != 'checkbox') {
						if (input.getProperty('data-def')) {
							input.setProperty('value', input.getProperty('data-def'));
						} else {
							input.setProperty('value', '');
						}
					} else {
						input.checked = false;
					}
				});
				$$('#dgDatos .blue').removeClass('blue');
			},

			camposObligatoriosCompletos: function (div) {
				var inputs;
				var datosOk = true;

				if (!div) {
					inputs = $$('.required .valor');
				} else {
					inputs = div.getElements('.required .valor');
				}

				for (i = 0; i < inputs.length; i++) {
					if (inputs[i].getProperty('value') == '') {
						datosOk = false;
						i = inputs.length;
					}
				}

				return datosOk;
			},


			informar: function (mensaje, titulo) {
				this.notificar(titulo, mensaje);
			},

			alertar: function (mensaje, titulo) {
				this.notificar(titulo, mensaje, 'fa-exclamation-circle', 'orange');
			},

			mostrarError: function (mensaje, titulo) {
				this.notificar(titulo, mensaje, 'fa-exclamation-circle', 'white');
			},

			notificar: function (titulo, texto, icono, color) {
				var backColor;
				titulo = (typeof titulo === 'undefined') ? '' : titulo;
				texto = (typeof texto === 'undefined') ? '' : texto;
				icono = (typeof icono === 'undefined') ? 'fa-thumbs-o-up' : icono;
				color = (typeof color === 'undefined') ? 'darkCobalt' : color;

				switch (color) {
				case 'darkCobalt':
					backColor = 'bg-lighterBlue bd-blue';
					break;
				case 'orange':
					backColor = 'bg-lightOrange bd-orange';
					break;
				case 'white':
					backColor = 'bg-lightRed bd-red';
					break;
				}

				this.jphNotificacionCantidad++;

				var $not = new Element('div', {"class": "jph-notificacion column-group", "id": "jph-notificacion-" + this.jphNotificacionCantidad, "data-orden": this.jphNotificacionCantidad});
				var $contenido = new Element('div', {"class": "all-100 align-center " + backColor + " " + color + " padding-10 alerta column-group"});
				var $cerrar = new Element('div', {"class": "jph-notificacion-cerrar column-group"});
				var $icono = new Element('div', {"class": "all-20 iconoalerta align-center"});
				var $mensaje = new Element('div', {"class": "all-80 align-left"});

				$cerrar.adopt(new Element('i', {"class": "fa fa-times"}));
				$icono.adopt(new Element('i', {"class": "fa " + icono}));

				$mensaje.adopt(new Element('h5', {"text": titulo, "class": color}));
				$mensaje.adopt(new Element('span', {"text": texto}));

				$contenido.adopt($cerrar);
				$contenido.adopt($icono);
				$contenido.adopt($mensaje);

				$not.adopt($contenido);
				$not.setStyle('opacity', '0');

				$$('body').adopt($not);

				$cerrar.addEvent('click', function () {
					var $not = $(this).getParent().getParent();
					new Fx.Tween($not, {
						onComplete: function () {
							$not.destroy();
						}
					}).start('opacity', 0);

					var h = 115;
					var $nots = $$('.jph-notificacion')

					$nots.sort(function ($a, $b) {
						return  $b.getData('orden') - $a.getData('orden');
					});

					$nots.each(function ($n) {
						if ($n != $not) {
							new Fx.Tween($n).start('top', h);
							h += $n.getStyle('height').toInt() + 10;
						}
					});
				});

				var h = $not.getDimensions().y + 10;

				var $nots = $$('.jph-notificacion')

				$nots.sort(function ($a, $b) {
					return  $b.getData('orden') - $a.getData('orden');
				});

				$nots.each(function ($n, i) {
					if (i < 3) {
						if ($n != $not) {
							new Fx.Tween($n).start('top', $n.getStyle('top').toInt() + h);
						}
					} else {
						new Fx.Tween($n, {
							onComplete: function () {
								$n.destroy();
							}
						}).start('opacity', 0);
					}
				});

				var ocultar = function () {
					new Fx.Tween($not, {
						onComplete: function () {
							$not.destroy();
						}
					}).start('opacity', 0);
				}

				new Fx.Tween($not).start('opacity', 1);
				window.setTimeout(ocultar, 2500);
			},
			myFunction:function () {
				this.myVar = setTimeout(this.showPage, 1000);
			},
			showPage: function () {
			  document.getElementById("loader").style.display = "none";
			  document.getElementById("myDiv").style.display = "block";
			},

			confirmar: function (mensaje, accionAceptar, titulo, txtBot1, txtBot2, accionCancelar) {
				$('divShade').setStyle('display', 'block');
				$('divShade').addClass('visible');
				$('divConfirm').getElement('h4 span').setProperty('html', titulo || 'Confirmación');
				$('divConfirm').getElement('p').setProperty('html', mensaje);
				$('btnCancelarConfirm').setProperty('text', txtBot1 || 'Cancelar');
				$('btnAceptarConfirm').setProperty('text', txtBot2 || 'Aceptar');

				var mover = new Fx.Tween('divConfirm', {
					transition: 'sine:in:out',
					link: 'cancel',
					property: 'top',
					unit: 'px'
				});

				var h = (window.getSize().y - $('divConfirm').getSize().y) / 2;
				mover.start(-500, h);

				$('btnAceptarConfirm').removeEvents('click');
				$('btnAceptarConfirm').addEvent('click', accionAceptar);
				$('btnCancelarConfirm').removeEvents('click');

				if (accionCancelar) {
					$('btnCancelarConfirm').addEvent('click', accionCancelar);
				}

				$('btnCancelarConfirm').addEvent('click', function (e) {
					e.stop();

					var mover = new Fx.Tween('divConfirm', {
						transition: 'sine:in:out',
						link: 'cancel',
						property: 'top',
						unit: 'px'
					});

					var h = (window.getSize().y - $('divConfirm').getSize().y) / 2;
					mover.start(h, -500);
					$('divShade').removeClass('visible');
					$('divShade').setStyle('display', 'none');
				});

				$('btnAceptarConfirm').addEvent('click', function (e) {
					e.stop();

					var mover = new Fx.Tween('divConfirm', {
						transition: 'sine:in:out',
						link: 'cancel',
						property: 'top',
						unit: 'px'
					});

					var h = (window.getSize().y - $('divConfirm').getSize().y) / 2;
					mover.start(h, -500);
					$('divShade').removeClass('visible');
					$('divShade').setStyle('display', 'none');
				});
			}
	}