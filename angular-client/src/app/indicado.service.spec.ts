import { TestBed } from '@angular/core/testing';

import { IndicadoService } from './indicado.service';

describe('IndicadoService', () => {
  let service: IndicadoService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(IndicadoService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
