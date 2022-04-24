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
  updateIndicadoForm: FormGroup = new FormGroup({
    nome: new FormControl(),
    cpf: new FormControl(),
    telefone: new FormControl(),
    email: new FormControl(),
    status_indicacao: new FormControl()
  });
  id: any = this.actRoute.snapshot.paramMap.get('id');

  ngOnInit() {
    this.updateForm()
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
        nome: [data.nome],
        cpf: [data.cpf],
        telefone: [data.telefone],
        email: [data.email],
        status_indicacao: [data.status_indicacao],
      })

    })
  }

  updateForm(){
    this.updateIndicadoForm = this.fb.group({
      nome: [''],
      cpf: [''],
      telefone: [''],
      email: [''],
      status_indicacao: [''],
    })
  }
  submitForm(){
    this.indicadoService.UpdateIndicado(this.id, this.updateIndicadoForm.value).subscribe(res =>{
      this.ngZone.run(() => this.router.navigateByUrl('/indicados-list'))
    })
  }
}
