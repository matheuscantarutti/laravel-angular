import { Component, OnInit, NgZone } from '@angular/core';
import { IndicadoService } from 'src/app/indicado.service';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-add-indicado',
  templateUrl: './add-indicado.component.html',
  styleUrls: ['./add-indicado.component.css'],
})
export class AddIndicadoComponent implements OnInit {
  IndicadoForm: FormGroup = new FormGroup({
    nome: new FormControl('', Validators.required),
    cpf: new FormControl('', Validators.required),
    telefone: new FormControl('', Validators.required),
    email: new FormControl('', Validators.required),
    status_indicacao: new FormControl()
  });

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

      this.ngZone.run(() => this.router.navigateByUrl('/indicados-list'));
    });
  }
}


