import { Component, OnInit, NgZone } from '@angular/core';
import { IndicadoService } from 'src/app/indicado.service';
import { FormBuilder, FormGroup, FormControl } from '@angular/forms';
import { Router, ActivatedRoute } from '@angular/router';
@Component({
  selector: 'app-update-indicado',
  templateUrl: './update-indicado.component.html',
  styleUrls: ['./update-indicado.component.css']
})
export class UpdateIndicadoComponent implements OnInit {
  indicado: any;
  updateIndicadoForm: FormGroup = new FormGroup({
    nome: new FormControl(''),
    cpf: new FormControl(),
    telefone: new FormControl(),
    email: new FormControl(),
    status_indicacao: new FormControl()
  });
  id: any = this.actRoute.snapshot.paramMap.get('id');
  Erros: any = [];

  ngOnInit() {
    //this.updateForm()
  }
  constructor(
    private actRoute: ActivatedRoute,
    public indicadoService: IndicadoService,
    public fb: FormBuilder,
    private ngZone: NgZone,
    private router: Router
  ) {
    this.indicadoService.GetIndicado(this.id).subscribe((data) => {
      this.updateIndicadoForm = this.fb.group({
        ...data
      })
    })

  }

  submitForm() {
    this.indicadoService.UpdateIndicado(this.id, this.updateIndicadoForm.value)
    .subscribe(res => {
      this.ngZone.run(() => this.router.navigateByUrl('/indicados-list'))
    }, (error) => {
      for (const key in error.error.erros) {
        if (Object.prototype.hasOwnProperty.call(error.error.erros, key)) {
          let element = error.error.erros[key];
          this.Erros.push(element);
        }
      }
    });
  }
}
