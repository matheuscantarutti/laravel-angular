import { Component, OnInit, NgZone } from '@angular/core';
import { IndicadoService } from 'src/app/indicado.service';
import { FormBuilder, FormControl, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-add-indicado',
  templateUrl: './add-indicado.component.html',
  styleUrls: ['./add-indicado.component.css'],
})
export class AddIndicadoComponent implements OnInit {
  IndicadoForm: FormGroup = new FormGroup({
    nome: new FormControl(),
    cpf: new FormControl(),
    telefone: new FormControl(),
    email: new FormControl(),
    status_indicacao: new FormControl()
  });
  IndicadoArr: any = [];
  ngOnInit() {
    this.addIndicado();
  }
  constructor(
    public fb: FormBuilder,
    private ngZone: NgZone,
    private router: Router,
    public IndicadoService: IndicadoService
  ) {}
  addIndicado() {
    this.IndicadoForm = this.fb.group({
      nome: [''],
      cpf: [''],
      telefone: [''],
      email: [''],
      status_indicacao: 1,
    });
  }
  submitForm() {
    this.IndicadoService.CreateIndicado(this.IndicadoForm.value).subscribe((res) => {
      console.log('Indicação criada!');
      this.ngZone.run(() => this.router.navigateByUrl('/indicados-list'));
    });
  }
}


