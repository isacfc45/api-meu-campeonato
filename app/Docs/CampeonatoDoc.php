<?php

namespace App\Docs;

/**
 * @OA\Tag(
 *     name="Campeonatos",
 *     description="Endpoints relacionados aos campeonatos de futebol"
 */

/**
 * @OA\Post(
 *     path="/api/campeonatos/simular",
 *     summary="Simular um novo campeonato",
 *     tags={"Campeonatos"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"nome"},
 *             @OA\Property(property="nome", type="string", example="Campeonato de Verão")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Campeonato simulado com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="nome", type="string", example="Campeonato de Verão"),
 *             @OA\Property(property="data_inicio", type="string", format="date-time", example="2024-02-01T00:00:00Z"),
 *             @OA\Property(property="data_fim", type="string", format="date-time", example="2024-02-05T00:00:00Z")
 *         )
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/api/campeonatos",
 *     summary="Listar todos os campeonatos",
 *     tags={"Campeonatos"},
 *     @OA\Response(
 *         response=200,
 *         description="Lista de campeonatos",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="nome", type="string", example="Campeonato de Verão"),
 *                 @OA\Property(property="data_inicio", type="string", format="date-time", example="2024-02-01T00:00:00Z"),
 *                 @OA\Property(property="data_fim", type="string", format="date-time", example="2024-02-05T00:00:00Z")
 *             )
 *         )
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/api/campeonatos/{id}",
 *     summary="Buscar detalhes de um campeonato",
 *     tags={"Campeonatos"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Detalhes do campeonato",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="nome", type="string", example="Campeonato de Verão"),
 *             @OA\Property(property="data_inicio", type="string", format="date-time", example="2024-02-01T00:00:00Z"),
 *             @OA\Property(property="data_fim", type="string", format="date-time", example="2024-02-05T00:00:00Z")
 *         )
 *     )
 * )
 */
class CampeonatoDoc {}
