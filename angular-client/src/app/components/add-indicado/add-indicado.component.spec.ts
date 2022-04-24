import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AddIndicadoComponent } from './add-indicado.component';

describe('AddIndicadoComponent', () => {
  let component: AddIndicadoComponent;
  let fixture: ComponentFixture<AddIndicadoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AddIndicadoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AddIndicadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
